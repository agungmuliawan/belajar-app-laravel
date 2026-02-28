<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    function index()
    {
        //return view('mahasiswa.index');
       // return "halo ini saya";

         $mahasiswas = [
        ['nama' => 'Budi',  'nim' => '001'],
        ['nama' => 'Siti',  'nim' => '002'],
        ['nama' => 'Doni',  'nim' => '003'],
    ];

    return view('mahasiswa2', compact('mahasiswas'));
    }

    public function create()
    {
        return view('inputan1');
    }
    public function store(Request $request)
{
    // Ambil data dari form
    $nama    = $request->nama;
    $nim     = $request->nim;
    $jurusan = $request->jurusan;
    print_r($request->all());
    return "Data diterima: $nama, $nim, $jurusan";
}

function crud()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa3', compact('mahasiswas'));
    }


     public function create2()
    {
        return view('inputan2');
    }

        public function store3(Request $request)
{
    DB::table('mahasiswas')->insert([
        'nama'    => $request->nama,
        'nim'     => $request->nim,
        'jurusan' => $request->jurusan,
    ]);

    return redirect('/mahasiswa4')->with('success', 'Data berhasil ditambahkan!');
}

   public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('edit', compact('mhs'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->update([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/mahasiswa3');
    }

    // Hapus data
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('/mahasiswa3');
    }

    //crud mahasiswa query builder 3
    function crud3()
    {
        $mahasiswas = DB::table('mahasiswas')->get();
        return view('mahasiswa4', compact('mahasiswas')); 
    }

    public function store4(Request $request)
{
    DB::table('mahasiswas')->insert([
        'nama'    => $request->nama,
        'nim'     => $request->nim,
        'jurusan' => $request->jurusan,
    ]);

    return redirect('/mahasiswa4')->with('success', 'Data berhasil ditambahkan!');
}
function destroy3($id)
    {
        DB::table('mahasiswas')->where('id', $id)->delete();
        return redirect('/mahasiswa4')->with('success', 'Data berhasil dihapus!');
    }

    public function edit3($id)
    {
        $mhs = DB::table('mahasiswas')->where('id', $id)->first();
        return view('edit3', compact('mhs'));
    }

    public function update3(Request $request, $id)
    {
        DB::table('mahasiswas')->where('id', $id)->update([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/mahasiswa4')->with('success', 'Data berhasil diupdate!');
    }
}
