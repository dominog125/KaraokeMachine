<?php

class Category extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 't_category';

    protected $primaryKey = 'IDCa';

    protected $fillable = [
        'Category',
    ];

    public $timestamps = false;
}
