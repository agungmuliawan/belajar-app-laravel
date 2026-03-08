@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h2>Form Tambah Mahasiswa CRUD</h2>

    @if ($errors->any())
        <div style="background-color: #fdecea; border: 1px solid #f44336; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <strong>Terdapat kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: #c0392b;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/mahasiswa3/store2" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
        @error('nama')
            <span style="color: red; font-size: 13px;">{{ $message }}</span>
        @enderror
        <br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" placeholder="Masukkan NIM" value="{{ old('nim') }}">
        @error('nim')
            <span style="color: red; font-size: 13px;">{{ $message }}</span>
        @enderror
        <br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" placeholder="Masukkan jurusan" value="{{ old('jurusan') }}">
        @error('jurusan')
            <span style="color: red; font-size: 13px;">{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Simpan</button>
        <a href="/mahasiswa">Batal</a>
    </form>
@endsection