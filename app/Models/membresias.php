<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membresias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_membresia',
        'descripcion',
        'duracion',
        'precio',
    ];
}
