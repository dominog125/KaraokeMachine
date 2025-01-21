<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 't_author';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Author',
    ];

    public $timestamps = false;
}
