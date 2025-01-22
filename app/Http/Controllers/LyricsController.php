<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lyrics;

class LyricsController extends Controller
{
    public function storeFromShow(Request $request)
    {
        $request->validate([
            'IDSong' => 'required|integer',
            'RowTe' => 'required|string',
            'TimeTe' => 'required|string',
        ]);

        Lyrics::create($request->all());

        // Przekierowanie do admin.songs.show
        return redirect()->route('admin.songs.show', ['song' => $request->IDSong])
            ->with('success', 'Dodano nowy wiersz tekstu.');
    }


    public function updateFromShow(Request $request, Lyrics $lyrics)
    {
        $request->validate([
            'RowTe' => 'required|string',
            'TimeTe' => 'required|string',
        ]);

        $lyrics->update($request->all());

        // Pobierz ID piosenki
        $songId = $lyrics->IDSong;

        // Przekierowanie do admin.songs.show z poprawnym ID
        return redirect()->route('admin.songs.show', ['song' => $songId])
            ->with('success', 'Tekst został zaktualizowany.');
    }
    public function destroyFromShow(Lyrics $lyrics)
    {
        $songId = $lyrics->IDSong;
        $lyrics->delete();

        // Przekierowanie do admin.songs.show z poprawnym ID
        return redirect()->route('admin.songs.show', ['song' => $songId])
            ->with('success', 'Tekst został usunięty.');
    }



}
