@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <h2>Form Tambah Mahasiswa CRUD</h2>

    <form action="/mahasiswa3/store2" method="POST">
        @csrf

        <label>Nama:</label><br>
        <input type="text" name="nama" placeholder="Masukkan nama"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" placeholder="Masukkan NIM"><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" placeholder="Masukkan jurusan"><br><br>

        <button type="submit">Simpan</button>
        <a href="/mahasiswa">Batal</a>
    </form>

@endsection