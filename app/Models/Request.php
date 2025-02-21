<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 't_request';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'IDSong',
        'RowPr',
        'TimePr',
        'ChangeType',
        'UserID',
        'RowPrOld',
        'TimePrOld',
        'status',
    ];
    public $timestamps = false;

    public function song()
    {
        return $this->belongsTo(Song::class, 'IDSong', 'ID');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\UsersLibrary\User::class, 'UserID', 'id');
    }
}
