<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }
        a.btn-custom, a.btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        a.btn-custom:hover, a.btn-back:hover {
            background-color: #0056b3;
        }
        a.btn-back {
            background-color: #6c757d;
        }
        a.btn-back:hover {
            background-color: #5a6268;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-info, .btn-warning, .btn-danger {
            display: inline-block;
            padding: 5px 10px;
            font-size: 0.875rem;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #333;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('albums.index') }}" class="btn-back">Kembali ke Album</a>
            <a href="{{ route('photos.create') }}" class="btn-custom">Tambah Foto</a>
        </div>
        <h1>Daftar Foto</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Foto</th>
                    <th>Deskripsi</th>
                    <th>Album</th>
                    <th>Preview</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td>{{ $photo->nama_foto }}</td>
                        <td>{{ $photo->deskripsi_foto }}</td>
                        <td>{{ $photo->album->nama_album }}</td>
                        <td>
                            @if($photo->foto)
                                <img src="{{ asset('storage/photos/' . $photo->foto) }}" alt="{{ $photo->nama_foto }}" style="width: 100px; height: auto; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('photos.show', $photo->id) }}" class="btn-info">Lihat</a>
                            <a href="{{ route('photos.edit', $photo->id) }}" class="btn-warning">Edit</a>
                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Anda yakin ingin menghapus foto ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
