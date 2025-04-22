@php
    $statusClasses = [
        'Activa' => 'bg-green-500',
        'Inactiva' => 'bg-gray-400',
        'Pausada' => 'bg-yellow-600',
        'Cancelada' => 'bg-red-500',
        'Expirada' => 'bg-purple-500',
    ];
@endphp

<div class="flex items-center">
    {{--}}
    <div class="relative w-12 h-6 flex items-center rounded-full p-1 
        {{ $status === 'Activa' ? 'bg-green-500' : 'bg-red-300' }}">
        <div class="absolute left-1 w-4 h-4 bg-white rounded-full transition 
            {{ $status === 'Activa' ? 'translate-x-6' : '' }}">
        </div>--}}
    <span class="ml-2 font-semibold text-sm px-2 py-1 rounded 
        {{ $statusClasses[$status] ?? 'bg-gray-300' }} text-white">
        {{ $status }}
    </span>
</div>
