<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea,
        .form-group select,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group img {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group .img-preview {
            width: 150px;
            height: auto;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Foto</h1>

        <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_foto">Nama Foto</label>
                <input type="text" name="nama_foto" id="nama_foto" value="{{ old('nama_foto', $photo->nama_foto) }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi_foto">Deskripsi Foto</label>
                <textarea name="deskripsi_foto" id="deskripsi_foto">{{ old('deskripsi_foto', $photo->deskripsi_foto) }}</textarea>
            </div>

            <div class="form-group">
                <label for="path_foto">Foto</label>
                @if($photo->path_foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/photos/' . $photo->path_foto) }}" alt="{{ $photo->nama_foto }}" class="img-preview">
                    </div>
                @endif
                <input type="file" name="path_foto" id="path_foto">
            </div>

            <div class="form-group">
                <label for="album_id">Album</label>
                <select name="album_id" id="album_id" required>
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}" {{ $photo->album_id == $album->id ? 'selected' : '' }}>
                            {{ $album->nama_album }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
