<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi_album' => 'nullable|string',
        ]);

        Album::create($request->all());

        return redirect()->route('albums.index')->with('success', 'Album berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with('photos')->findOrFail($id); // Memuat album beserta foto terkait
    return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi_album' => 'nullable|string',
        ]);

        $album->update($request->all());

        return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album berhasil dihapus.');
    }
}
