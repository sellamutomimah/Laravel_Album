<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Album</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
        .btn-custom, .btn-secondary, .btn-info, .btn-warning, .btn-danger {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        .btn-custom {
            background-color: #007bff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        <h1>Daftar Album</h1>

        <div class="mb-3">
            <a href="{{ route('albums.create') }}" class="btn-custom">Tambah Album</a>
            <a href="{{ route('photos.index') }}" class="btn-secondary">Lihat Foto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Album</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->nama_album }}</td>
                        <td>{{ $album->deskripsi_album }}</td>
                        <td>
                            <a href="{{ route('albums.show', $album->id) }}" class="btn-info">Lihat</a>
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn-warning">Edit</a>
                            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Anda yakin ingin menghapus album ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
