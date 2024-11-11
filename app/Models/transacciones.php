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
}
