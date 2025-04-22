<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transacciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'suscripcion_id',
        'user_id',
        'membresia_id',
        'status',
        'monto',
        'fecha_pago',
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
