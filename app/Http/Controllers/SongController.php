<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Lyrics;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $songs = Song::all();
            //dd($songs);
           return view('admin.songs.index', ['songs' => $songs]);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
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
            'Ytlink' => 'string|nullable',
        ]);

        Song::create($request->all());

        return redirect()->route('songs.index')->with('success', 'Utworzono nową piosenkę.');
    }

    /**
     * Display the specified song.
     */
    public function show(Song $song)
    {

        $lyrics = DB::table('t_lyrics AS l')->select('l.*')
            ->Where('l.IDSong','=',$song->ID)->orderBy('l.TimeTe','asc')->get();

        return view('admin.songs.show', compact('song'),['lyrics' => $lyrics]);
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
            'Ytlink' => 'string|nullable',
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

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('t_song AS s')->select('s.*', 'c.category AS category_name', 'a.author AS author_name')
            ->Join('t_category AS c', 's.Category', '=', 'c.id')
            ->Join('t_author AS a', 's.Author', '=', 'a.id')
            ->Where('Title','like',"%$search%")->paginate(5);

        return view('searchbar',['results' => $results]);

    }

    public function searchTop5(Request $request)
    {
        $search = $request->input('search');

        $results = DB::table('t_song AS s')
            ->select('s.*', 'c.category AS category_name', 'a.author AS author_name')
            ->Join('t_category AS c', 's.Category', '=', 'c.id')
            ->Join('t_author AS a', 's.Author', '=', 'a.id')
            ->orderBy('Likes','desc')
            ->orderBy('Title','asc')
            ->limit(5)
            ->get();

        return view('welcome',['results' => $results]);

    }
    public function showSong($id){
        $results = DB::table('t_song AS s')->select('s.*', 'c.category AS category_name', 'a.author AS author_name')
            ->Join('t_category AS c', 's.Category', '=', 'c.id')
            ->Join('t_author AS a', 's.Author', '=', 'a.id')->Where('s.ID','=',$id)->get();

        $lyrics = DB::table('t_lyrics AS l')->select('l.*')
            ->Where('l.IDSong','=',$id)->orderBy('l.TimeTe','asc')->get();

        return view('song',['results' => $results],['lyrics' => $lyrics]);

    }


}
