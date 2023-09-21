<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingWeb extends Model
{
    use HasFactory;
    protected $table = 'setting_webs';
    protected $fillable = 
[
    'name',
    'title',
    'logo',
    'meta_title',
    'meta_desc',
    'keyword',
    'og_url',
    'status',
 
];



}
