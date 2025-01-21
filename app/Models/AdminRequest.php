<?php

class AdminRequest extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_adminrequest';

    protected $primaryKey = 'IDTWn';

    protected $fillable = [
        'IDSong',
        'IDRow',
        'IDRowCh',
    ];

    public $timestamps = false;

    public function song()
    {
        return $this->belongsTo(Song::class, 'IDSong', 'IDPi');
    }

    public function lyrics()
    {
        return $this->belongsTo(Lyrics::class, 'IDTe', 'IDRow');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'IDPr', 'IDRowCh');
    }
}
