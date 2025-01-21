<?php

class Lyrics extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_lyrics';

    protected $primaryKey = 'IDTe';

    protected $fillable = [
        'IDSong',
        'RowTe',
        'TimeTe',
    ];

    public $timestamps = false;

    public function song()
    {
        return $this->belongsTo(Song::class, 'IDSong', 'IDPi');
    }
}
