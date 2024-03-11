<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hydrography extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'type', 'productor_name',
        'productor_phone',
        'productor_email',
        'productor_website',];

    public function reunion() {
        return $this->hasOne(Reunion::class);
    }


}
