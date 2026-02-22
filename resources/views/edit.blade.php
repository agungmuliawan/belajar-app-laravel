@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Form Edit Mahasiswa CRUD</h2>

    <form action="/mahasiswa3/update/{{ $mhs->id }}" method="POST">
        @csrf

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $mhs->nama }}"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="{{ $mhs->nim }}"><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="{{ $mhs->jurusan }}"><br><br>

        <button type="submit">Update</button>
        <a href="/mahasiswa3">Batal</a>
    </form>

@endsection
