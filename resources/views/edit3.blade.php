@extends('layouts.app')

@section('title', 'Home')

@section('content')


<div class="card shadow-sm" style="max-width: 500px; margin: auto;">
    <div class="card-header bg-warning fw-bold">✏️ Edit Mahasiswa</div>
    <div class="card-body">
        <form action="/mahasiswa4/update/{{ $mhs->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $mhs->nim }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="{{ $mhs->jurusan }}" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning w-100">💾 Simpan</button>
                <a href="/mahasiswa4" class="btn btn-secondary w-100">↩️ Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection