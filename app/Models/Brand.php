<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function illumiantions()
    {
        return $this->hasMany(Illumination::class);
    }
}
