<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBanner extends Model
{
    use HasFactory;
    protected $table = 'image_banners';

    protected $fillable = [
        'banner_id',
        'image'
    ];


    function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
