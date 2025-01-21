<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_song';

    protected $primaryKey = 'ID';

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
        return $this->belongsTo(Author::class, 'Author', 'ID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category', 'ID');
    }
}
