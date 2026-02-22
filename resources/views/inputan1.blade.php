@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <h2>Form Input Mahasiswa</h2>

    <form action="/mahasiswa2/store" method="POST">
        @csrf

        <label>Nama:</label><br>
        <input type="text" name="nama" placeholder="Masukkan nama"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" placeholder="Masukkan NIM"><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" placeholder="Masukkan jurusan"><br><br>

        <button type="submit">Kirim</button>
    </form> 

@endsection


