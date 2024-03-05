<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
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
        'illuminations_id',
    ];


    public function illuminations() {
        return $this->belongsTo(Illumination::class);
    }
}
