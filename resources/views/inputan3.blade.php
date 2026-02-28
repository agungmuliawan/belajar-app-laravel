@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="card shadow-sm" style="max-width: 500px; margin: auto;">
    <div class="card-header bg-success text-white fw-bold">
        ➕ Tambah Mahasiswa
    </div>
    <div class="card-body">
        <form action="/mahasiswa" method="POST">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..." required>
            </div>

            {{-- NIM --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM..." required>
            </div>

            {{-- Jurusan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan..." required>
            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success w-100">💾 Simpan</button>
                <a href="/mahasiswa" class="btn btn-secondary w-100">↩️ Kembali</a>
            </div>

        </form>
    </div>
</div>

@endsection