<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Info extends Model
{
    use HasFactory;
    protected $table = 'contact_infos';
    protected $fillable = [
        'phone',
        'email',
        'address',
        'link',
        'status',
    ];
}
