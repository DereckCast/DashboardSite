<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = ['nombre'];

    public function ciudadanos()
    {
        return $this->hasMany(Ciudadano::class);
    }
}
