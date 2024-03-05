<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illumination extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'light_id', 'model', 'brand_id', 'model_year', 'version', 'image'];


    public function light()
    {
        return $this->belongsTo(Light::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }



    // has a detail
    public function detail()
    {
        return $this->hasOne(Detail::class);
    }
}
