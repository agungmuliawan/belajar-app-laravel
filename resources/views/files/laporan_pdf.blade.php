<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan File</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 4px;
        }
        p.sub {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th {
            background-color: #4a4a8a;
            color: white;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 7px 8px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        tr:nth-child(even) td {
            background-color: #f5f5f5;
        }
        .footer {
            margin-top: 24px;
            font-size: 11px;
            color: #888;
            text-align: right;
        }
        .no-img {
            font-size: 10px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <h2>Laporan Data File</h2>
    <p class="sub">Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Preview</th>
                <th>Nama File</th>
                <th>Tipe</th>
                <th>Ukuran</th>
                <th>Tanggal Upload</th>
            </tr>
        </thead>
        <tbody>
            @forelse($files as $index => $file)
            <tr>
                <td>{{ $index + 1 }}</td>

                {{-- Kolom gambar --}}
                <td>
                    @if(in_array($file->tipe_file, ['jpg', 'jpeg', 'png', 'gif']))
                        {{-- Pakai storage_path untuk path absolut --}}
                        <img src="{{ storage_path('app/public/' . $file->path_file) }}"
                             width="60"
                             height="60"
                             style="object-fit:cover; border-radius:4px;">
                    @else
                        <span class="no-img">{{ strtoupper($file->tipe_file) }}</span>
                    @endif
                </td>

                <td>{{ $file->nama_asli }}</td>
                <td>{{ strtoupper($file->tipe_file) }}</td>
                <td>{{ number_format($file->ukuran / 1024, 2) }} KB</td>
                <td>{{ $file->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center">Belum ada data file</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Total file: {{ $files->count() }}
    </div>

</body>
</html>