@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- FORM TAMBAH --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-success text-white fw-bold">➕ Tambah Mahasiswa</div>
    <div class="card-body">
        <form action="/mahasiswa4/store4" method="POST">
            @csrf
            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- TABEL DATA --}}
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">📋 Daftar Mahasiswa</div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswas as $index => $mhs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->jurusan }}</td>
                    <td>
                        <a href="/mahasiswa4/edit/{{ $mhs->id }}"
                        class="btn btn-warning btn-sm"> ✏️ Edit </a>
                    <a href="/mahasiswa4/delete/{{ $mhs->id }}"
                    onclick="return confirm('Yakin hapus data ini?')"
                    class="btn btn-danger btn-sm">
                    🗑️ Hapus
                    </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        Total: <strong>{{ $mahasiswas->count() }}</strong> mahasiswa
    </div>
</div>


@endsection