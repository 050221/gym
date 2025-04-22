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

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: una suscripción pertenece a una membresía
    public function membresia()
    {
        return $this->belongsTo(membresias::class);
    }
}
