<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start',
        'day',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'billing',
        'status',
        'hydrographies_id',
    ];
}
