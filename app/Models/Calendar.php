<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
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
        'sales_id',
        'billing',
        'status',
        'illuminations_id',
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }

}
