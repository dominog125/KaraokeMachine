<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Songs;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('admin.songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new song.
     */
    public function create()
    {
        return view('admin.songs.create');
    }

    /**
     * Store a newly created song in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string',
            'Author' => 'required|integer',
            'Likes' => 'integer|nullable',
            'Category' => 'required|integer',
            // 'Ytlink' => 'string|nullable',
        ]);

        Song::create($request->all());

        return redirect()->route('songs.index')->with('success', 'Utworzono nową piosenkę.');
    }

    /**
     * Display the specified song.
     */
    public function show(Song $song)
    {
        return view('admin.songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified song.
     */
    public function edit(Song $song)
    {
        return view('admin.songs.edit', compact('song'));
    }

    /**
     * Update the specified song in storage.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'Title' => 'required|string',
            'Author' => 'required|integer',
            'Likes' => 'integer|nullable',
            'Category' => 'required|integer',
            // 'Ytlink' => 'string|nullable',
        ]);

        $song->update($request->all());

        return redirect()->route('songs.index')->with('success', 'Dane piosenki zostały zaktualizowane.');
    }

    /**
     * Remove the specified song from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Piosenka została usunięta.');
    }
}
