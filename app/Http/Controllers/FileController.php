<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    // ========== UPLOAD FILE ==========
public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|file|max:2048|mimes:jpg,png,pdf'
    ]);

    $file = $request->file('file');
    $path = $file->store('uploads', 'public');

    File::create([
        'nama_asli' => $file->getClientOriginalName(),
        'path_file' => $path,
        'tipe_file' => $file->getClientOriginalExtension(),
        'ukuran'    => $file->getSize(),   // ← pastikan baris ini ada
    ]);

    return back()->with('sukses', 'File berhasil diupload!');
}

    // ========== TAMPILKAN SEMUA FILE ==========
    public function index()
    {
        $files = File::latest()->get();
        return view('files.index', compact('files'));
    }

    // ========== DOWNLOAD FILE ==========
    public function download($id)
    {
        $file = File::findOrFail($id);

        // Cek apakah file ada di storage
        if (!Storage::disk('public')->exists($file->path_file)) {
            return back()->with('error', 'File tidak ditemukan!');
        }

        return Storage::disk('public')->download($file->path_file, $file->nama_asli);
    }

    // ========== HAPUS FILE ==========
    public function hapus($id)
    {
        $file = File::findOrFail($id);

        // Hapus dari storage dulu, baru dari database
        Storage::disk('public')->delete($file->path_file);
        $file->delete();

        return back()->with('sukses', 'File berhasil dihapus!');
    }
}