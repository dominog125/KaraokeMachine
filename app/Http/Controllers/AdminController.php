<?php

namespace App\Http\Controllers;

use App\Models\UsersLibrary\User;

class  AdminController extends Controller
{
    public function dashboard()
    {
        // Tu można np. podsumować statystyki, liczbę użytkowników itp.
        return view('admin.dashboard');
    }

    public function banUser(User $user)
    {
        $user->update(['is_banned' => true]);
        return redirect()->back()->with('success', 'Użytkownik został zbanowany.');
    }

    public function handleChange(ChangeProposal $proposal, string $action)
    {
        if ($action === 'accept') {
            // np. aktualizujemy tekst piosenki
            $proposal->song->update([
                'lyrics' => $proposal->proposed_changes
            ]);
            $proposal->update(['status' => 'accepted']);
        } elseif ($action === 'reject') {
            $proposal->update(['status' => 'rejected']);
        }

        return redirect()->back()->with('success', 'Zmiana została przetworzona.');
    }
}
