<?php

namespace App\Models\UsersLibrary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedSong extends Model
{
    use HasFactory;

    protected $table = 'TableLikedSongs';

    protected $fillable = ['idUser', 'idSong'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function song()
    {
        return $this->belongsTo(Song::class, 'idSong');
    }
}
