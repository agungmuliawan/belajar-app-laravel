{{-- resources/views/images/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Manipulasi Gambar</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .kartu { border: 1px solid #ddd; padding: 12px; margin-bottom: 16px; border-radius: 8px; }
        .kartu img { border-radius: 4px; }
        .label { font-size: 11px; color: #888; margin-top: 6px; }
        .grid { display: flex; gap: 16px; flex-wrap: wrap; }
    </style>
</head>
<body>

<h2>Upload & Manipulasi Gambar</h2>

@if(session('sukses'))
    <p style="color:green">{{ session('sukses') }}</p>
@endif

{{-- Form Upload --}}
<form action="{{ route('images.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="gambar" accept="image/*">
    @error('gambar') <span style="color:red">{{ $message }}</span> @enderror
    <button type="submit">Upload & Proses</button>
</form>

<hr>

{{-- Daftar Hasil --}}
@forelse($images as $image)
<div class="kartu">
    <strong>{{ $image->nama_asli }}</strong>

    <div class="grid" style="margin-top: 10px">

        {{-- Original --}}
        <div>
            <img src="{{ Storage::url($image->path_original) }}" height="120">
            <div class="label">Original</div>
        </div>

        {{-- Resize 400x300 --}}
        <div>
            <img src="{{ Storage::url($image->path_resize) }}" height="120">
            <div class="label">Resize 400x300</div>
        </div>

        {{-- Crop 200x200 --}}
        <div>
            <img src="{{ Storage::url($image->path_crop) }}" height="120">
            <div class="label">Crop 200x200</div>
        </div>

    </div>

    {{-- Tombol Hapus --}}
    <form action="{{ route('images.hapus', $image->id) }}" method="POST" style="margin-top:10px">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Yakin hapus?')" style="color:red">Hapus</button>
    </form>
</div>
@empty
    <p>Belum ada gambar.</p>
@endforelse

</body>
</html>