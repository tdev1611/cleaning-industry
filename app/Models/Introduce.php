<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'license_date',
        'tax_code',
        'service',
        'address',
        'phone',
        'managed_by',
        'status',
    ];
}
