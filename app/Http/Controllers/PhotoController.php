<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('photos.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_foto' => 'required|string|max:255',
        'deskripsi_foto' => 'nullable|string',
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'album_id' => 'required|exists:albums,id',
    ]);

    // Meng-upload foto
    $fotoPath = $request->file('foto')->store('public/photos');

    // Menyimpan data foto ke database
    Photo::create([
        'nama_foto' => $request->input('nama_foto'),
        'deskripsi_foto' => $request->input('deskripsi_foto'),
        'foto' => basename($fotoPath), // Menyimpan nama file
        'album_id' => $request->input('album_id'),
    ]);

    return redirect()->route('photos.index')->with('success', 'Foto berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $albums = Album::all();
        return view('photos.edit', compact('photo', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'nama_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'nullable|string',
            'path_foto' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required|exists:albums,id',
        ]);
    
        $data = $request->only(['nama_foto', 'deskripsi_foto', 'album_id']);
    
        if ($request->hasFile('path_foto')) {
            // Hapus foto lama jika ada
            if ($photo->path_foto) {
                Storage::disk('public')->delete('photos/' . $photo->path_foto);
            }
    
            // Simpan foto baru
            $file = $request->file('path_foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $filename, 'public');
    
            $data['path_foto'] = $filename;
        }
    
        $photo->update($data);
    
        return redirect()->route('photos.index')->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus.');
    }
}
