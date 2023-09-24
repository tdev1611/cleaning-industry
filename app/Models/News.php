<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'slug',
        'category_new_id',
        'content',
        'image',
        'ordinal',
        'status'
    ];


    function category()
    {
        return $this->belongsTo(CategoryNew::class,'category_new_id');
    }
}
