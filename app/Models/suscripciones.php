<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suscripciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membresia_id',
        'status',
        'fecha_inicio',
        'fecha_fin',
    ];
}
