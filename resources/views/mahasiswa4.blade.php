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

{{-- FORM SEARCH --}}
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form action="/mahasiswa/search" method="GET" class="d-flex gap-2">
            <input type="text" name="keyword" class="form-control" placeholder="🔍 Cari nama atau NIM...">
            <button class="btn btn-primary px-4">Cari</button>
            <a href="/mahasiswa" class="btn btn-secondary">Reset</a>
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
   class="btn btn-warning btn-sm">
   ✏️ Edit
</a>

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

{{-- MODAL EDIT --}}
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title fw-bold">✏️ Edit Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" id="editNama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="editJurusan" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEdit(id, nama, jurusan) {
    document.getElementById('editNama').value    = nama;
    document.getElementById('editJurusan').value = jurusan;
    document.getElementById('formEdit').action   = '/mahasiswa/' + id;

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>

@endsection