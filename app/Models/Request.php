<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 't_request';

    protected $primaryKey = 'IDPr';

    protected $fillable = [
        'IDSong',
        'RowPr',
        'TimePr',
    ];

    public $timestamps = false;

    public function song()
    {
        return $this->belongsTo(Song::class, 'IDSong', 'IDPi');
    }
}
