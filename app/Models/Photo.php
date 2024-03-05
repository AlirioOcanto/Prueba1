<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'illumination_id'];

    public function light()
    {
        return $this->belongsTo(Illumination::class);
    }
}
