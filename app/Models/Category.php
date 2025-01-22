<?php
namespace App\Models;

class Category extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_category';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Category',
    ];

    public $timestamps = false;
}
