<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membresias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion_meses',
        'precio',
    ];

    public function suscripciones()
    {
        return $this->hasMany(suscripciones::class, 'membresia_id');
    }
}
