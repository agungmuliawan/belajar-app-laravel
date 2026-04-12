{{-- resources/views/files/index.blade.php --}}
<h2>Upload File</h2>

{{-- Pesan sukses/error --}}
@if(session('sukses'))
    <p style="color:green">{{ session('sukses') }}</p>
@endif

{{-- Form Upload --}}
<form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    @error('file') <span style="color:red">{{ $message }}</span> @enderror
    <button type="submit">Upload</button>
</form>

{{-- Daftar File --}}
<h3>Daftar File</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>Nama File</th>
        <th>Tipe</th>
        <th>Aksi</th>
    </tr>
    @foreach($files as $file)
    <tr>
        <td>{{ $file->nama_asli }}</td>
        <td>{{ $file->tipe_file }}</td>
        <td>
            {{-- Preview (khusus gambar) --}}
            <img src="{{ Storage::url($file->path_file) }}"
                 width="60" alt="preview"
                 onerror="this.style.display='none'">

            {{-- Download --}}
            <a href="{{ route('files.download', $file->id) }}">Download</a>

            {{-- Hapus --}}
            <form action="{{ route('files.hapus', $file->id) }}"
                  method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>