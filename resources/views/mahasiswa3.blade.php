@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Daftar Mahasiswa</h2>

    <a href="/mahasiswa3/create2">+ Tambah Mahasiswa</a><br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        @forelse ($mahasiswas as $index => $mhs)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>
                <a href="/mahasiswa3/edit/{{ $mhs->id }}">Edit</a> |
                <a href="/mahasiswa3/delete/{{ $mhs->id }}"
                   onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Belum ada data mahasiswa.</td>
        </tr>
        @endforelse

    </table>

@endsection