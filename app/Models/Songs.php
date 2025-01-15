<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 't_author';

    protected $primaryKey = 'IDAu'; 

    protected $fillable = [
        'Author',
    ];

    public $timestamps = false;
}

class Category extends Model
{
    use HasFactory;

    protected $table = 't_category';

    protected $primaryKey = 'IDCa'; 

    protected $fillable = [
        'Category',
    ];

    public $timestamps = false;
}

class Song extends Model
{
    use HasFactory;

    protected $table = 't_song';

    protected $primaryKey = 'IDPi'; 

    protected $fillable = [
        'Title',
        'Author',
        'Likes',
        'Category',
        'Ytlink'
    ];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Author::class, 'Author', 'IDAu');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category', 'IDCa');
    }
}

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

class Lyrics extends Model
{
    use HasFactory;

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

class AdminRequest extends Model
{
    use HasFactory;

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
