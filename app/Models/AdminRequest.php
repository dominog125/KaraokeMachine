<?php

class AdminRequest extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_adminrequest';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'IDSong',
        'IDRow',
        'IDRowCh',
    ];

    public $timestamps = false;

    public function song()
    {
        return $this->belongsTo(Song::class, 'ID', 'ID');
    }

    public function lyrics()
    {
        return $this->belongsTo(Lyrics::class, 'ID', 'ID');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'ID', 'ID');
    }
}
