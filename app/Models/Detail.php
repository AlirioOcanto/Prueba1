<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['illumination_id', 'description'];

    public function illumination()
    {
        return $this->belongsTo(Illumination::class);
    }
}
