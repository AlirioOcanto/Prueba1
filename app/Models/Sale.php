<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'model',
        'model_year',
        'version',
        'color',
        'price',
        'type',
        'description',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function calendar()
    {
        return $this->hasOne(Calendar::class);
    }

    public function instalation()
    {
        return $this->hasOne(Instalation::class);
    }

}
