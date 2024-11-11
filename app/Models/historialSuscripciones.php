<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historialSuscripciones extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'membresia_id',
        'fecha_inicio',
        'fecha_fin',
        'estado_anterior',
    ];
}
