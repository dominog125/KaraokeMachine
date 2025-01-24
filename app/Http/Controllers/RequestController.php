<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
class RequestController extends Controller
{



    public function create($song_id)
    {
        // Znajdź piosenkę w bazie danych
        $song = $song_id;

        // Jeśli piosenka nie istnieje, przekieruj z komunikatem błędu
        if (!$song) {
            return redirect()->back()->with('error', 'Song not found.');
        }

        // Przekaż `song_id` do widoku
        return view('request', compact('song_id'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a request.');
        }

        $validated = $request->validate([
            'IDSong' => 'required|exists:t_song,ID',
            'RowPr' => 'required|string',
            'TimePr' => 'required|string',
            'ChangeType' => 'required|in:change_text,new_text',
            'RowPrOld' => 'required_if:ChangeType,change_text|string|nullable',
            'TimePrOld' => 'required_if:ChangeType,change_text|string|nullable',
        ]);



        $requestModel = new RequestModel();
        $requestModel->IDSong = $validated['IDSong'];
        $requestModel->RowPr = $validated['RowPr'];
        $requestModel->TimePr = $validated['TimePr'];
        $requestModel->ChangeType = $validated['ChangeType'];
        $requestModel->UserID = Auth::id();

        if ($validated['ChangeType'] === 'change_text') {
            $requestModel->RowPrOld = $validated['RowPrOld'];
            $requestModel->TimePrOld = $validated['TimePrOld'];
        }

        $requestModel->save();

        return redirect()->route('song.show', ['id' => $validated['IDSong']])->with('success', 'Request submitted successfully!');
    }
}
