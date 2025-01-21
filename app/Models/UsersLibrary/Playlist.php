<?php

namespace App\Models\UsersLibrary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'TablePlaylists';

    protected $fillable = [
        'idUser',
        'namePlaylist',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function tracks()
    {
        return $this->hasMany(PlaylistTracks::class, 'idPlaylist');
    }
}
