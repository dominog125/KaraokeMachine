<?php

namespace App\Models\UsersLibrary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlaylistTrack extends Model
{
    use HasFactory;

    protected $table = 'TablePlaylistTracks';

    protected $fillable = [
        'idPlaylist',
        'idSong',
    ];

    public function playlist()
    {
        return $this->belongsTo(TablePlaylist::class, 'idPlaylist');
    }

    public function song()
    {
        return $this->belongsTo(Song::class, 'idSong');
    }
}
