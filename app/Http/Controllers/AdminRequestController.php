<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\Lyrics;
use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index()
    {
        $requests = RequestModel::where('status', 'pending')->get();
        return view('admin.requests.index', ['requests' => $requests]);
    }


    public function updateStatus(RequestModel $request, $status)
    {
        // Ustaw nowy status tylko, jeśli jest on prawidłowy
        if (!in_array($status, ['pending', 'accepted', 'declined'])) {
            return redirect()->route('admin.requests.index')->with('error', 'Nieprawidłowy status.');
        }

        $request->status = $status;
        $request->save();

        if ($status === 'accepted') {
            // Obsługa zaakceptowanego wniosku
            if ($request->ChangeType === 'change_text') {
                // Znajdź rekord w tabeli `t_lyrics`, który pokrywa się z `RowPrOld` i `TimePrOld`
                $lyric = Lyrics::where('RowTe', $request->RowPrOld)
                    ->where('TimeTe', $request->TimePrOld)
                    ->where('IDSong', $request->IDSong)
                    ->first();

                if ($lyric) {
                    // Zaktualizuj rekord
                    $lyric->RowTe = $request->RowPr;
                    $lyric->TimeTe = $request->TimePr;
                    $lyric->save();
                } else {
                    // Jeśli nie znaleziono, można zwrócić komunikat o błędzie
                    return redirect()->route('admin.requests.index')->with('error', 'Nie znaleziono rekordu do aktualizacji.');
                }
            } elseif ($request->ChangeType === 'new_text') {
                // Stwórz nowy rekord w tabeli `t_lyrics`
                Lyrics::create([
                    'IDSong' => $request->IDSong,
                    'RowTe' => $request->RowPr,
                    'TimeTe' => $request->TimePr,
                ]);
            }
        }

        return redirect()->route('admin.requests.index')->with('success', 'Status został zaktualizowany.');
    }
}
