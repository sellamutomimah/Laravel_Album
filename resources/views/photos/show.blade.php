<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Foto</title>
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
        .mb-3 {
            margin-bottom: 1rem;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Foto</h1>

        <div class="mb-3">
            <strong>Nama Foto:</strong> {{ $photo->nama_foto }}
        </div>

        <div class="mb-3">
            <strong>Deskripsi Foto:</strong> {{ $photo->deskripsi_foto }}
        </div>

        <div class="mb-3">
            <strong>Foto:</strong>
            <img src="{{ asset('storage/photos/' . $photo->foto) }}" alt="{{ $photo->nama_foto }}" class="img-fluid">
        </div>

        <a href="{{ route('photos.index') }}" class="btn-secondary">Kembali</a>
    </div>
</body>
</html>
