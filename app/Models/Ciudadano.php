<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
{
    use HasFactory;

    protected $table = 'ciudadanos';

    protected $fillable = ['nombre', 'email', 'ciudad_id'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
