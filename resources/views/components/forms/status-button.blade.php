@props(['status'])

@php
    $color = match ($status) {
        //suscripciones
        'Activa' => ' bg-green-300 text-green-700 font-semibold ', 
        'Inactiva' => 'bg-gray-300 text-gray-700 font-semibold ',
        'Pausada' => 'bg-yellow-300 text-yellow-700 font-semibold ',
        'Cancelada' => 'bg-red-400 text-red-700 font-semibold ',
        'Expirada' => 'bg-purple-300 text-purple-700 font-semibold ',
        'Modificada' => 'bg-yellow-300 text-yellow-700 font-semibold ',
        //clientes
        'Activo' => ' bg-green-300 text-green-700 font-semibold ', 
        'Inactivo' => 'bg-red-400 text-red-700 font-semibold ',
        default => 'bg-green-300 text-green-700 font-semibold '
    };
@endphp

<button class="{{ $color }}   px-2.5 py-1 rounded-2xl">
    {{ $status }}
</button>
