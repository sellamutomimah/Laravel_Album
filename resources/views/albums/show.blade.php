<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Album</title>
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
            max-width: 800px;
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
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            padding: 15px;
        }
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #6c757d;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .photo-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .photo-gallery img {
            width: 150px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Album</h1>

        <div class="card">
            <div class="card-header">
                {{ $album->nama_album }}
            </div>
            <div class="card-body">
                <p><strong>Deskripsi:</strong> {{ $album->deskripsi_album }}</p>
            </div>
        </div>

        <h2>Foto-Foto di Album Ini</h2>
        <div class="photo-gallery">
            @forelse($album->photos as $photo)
                <img src="{{ asset('storage/photos/' . $photo->foto) }}" alt="{{ $photo->nama_foto }}">
            @empty
                <p>Tidak ada foto di album ini.</p>
            @endforelse
        </div>

        <a href="{{ route('albums.index') }}" class="btn-secondary">Kembali ke Daftar Album</a>
    </div>
</body>
</html>
