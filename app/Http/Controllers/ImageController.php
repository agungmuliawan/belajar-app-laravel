<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Image;


class ImageController extends Controller
{
    // ========== TAMPILKAN SEMUA ==========
    public function index()
    {
        $images = Image::latest()->get();
        return view('images.index', compact('images'));
    }

    // ========== UPLOAD & MANIPULASI ==========
    public function upload(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Buat manager dengan driver GD
        $manager = new ImageManager(new Driver());

        $file     = $request->file('gambar');
        $namaAsli = $file->getClientOriginalName();
        $ekstensi = $file->getClientOriginalExtension();
        $namaUnik = time() . '_' . uniqid();

        // --- Simpan file ORIGINAL ---
        $namaOriginal = $namaUnik . '_original.' . $ekstensi;
        $file->storeAs('images', $namaOriginal, 'public');

        // --- Buat versi RESIZE (400x300) ---
        $namaResize = $namaUnik . '_resize.' . $ekstensi;
        $manager->read($file->getRealPath())
                ->resize(400, 300)  // lebar 400, tinggi 300 piksel
                ->save(storage_path('app/public/images/' . $namaResize));

        // --- Buat versi CROP (200x200, dari tengah) ---
        $namaCrop = $namaUnik . '_crop.' . $ekstensi;
        $manager->read($file->getRealPath())
                ->cover(200, 200)   // crop dari tengah jadi kotak
                ->save(storage_path('app/public/images/' . $namaCrop));

        // Simpan ke database
        Image::create([
            'nama_asli'       => $namaAsli,
            'path_original'   => 'images/' . $namaOriginal,
            'path_resize'     => 'images/' . $namaResize,
            'path_crop'       => 'images/' . $namaCrop,
        ]);

        return back()->with('sukses', 'Gambar berhasil diproses!');
    }

    // ========== HAPUS ==========
    public function hapus($id)
    {
        $image = Image::findOrFail($id);

        // Hapus ketiga file dari storage
        \Storage::disk('public')->delete($image->path_original);
        \Storage::disk('public')->delete($image->path_resize);
        \Storage::disk('public')->delete($image->path_crop);

        $image->delete();

        return back()->with('sukses', 'Gambar berhasil dihapus!');
    }
}
