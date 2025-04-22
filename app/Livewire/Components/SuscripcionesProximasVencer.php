<?php
namespace App\Livewire\Components;

use App\Models\suscripciones;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class SuscripcionesProximasVencer extends Component
{
    use WithPagination;

    // Almacenamos el índice del panel abierto
    public $openPanel = null;

    // Eliminamos la propiedad $suscripciones

    // Función para alternar la visibilidad del panel
    public function togglePanel($index)
    {
        $this->openPanel = $this->openPanel === $index ? null : $index;
    }

    public function render()
    {
        $now = Carbon::today();           // hoy a las 00:00:00
        $endDate = $now->copy()->addDays(5)->endOfDay(); // 5 días después, al final del día
        
        // Obtenemos las suscripciones a punto de vencer en el render
        $suscripciones = suscripciones::whereBetween('fecha_fin', [$now, $endDate])
            ->with(['user', 'membresia'])
            ->paginate(9);
        
        return view('livewire.components.suscripciones-proximas-vencer', compact('suscripciones'));
    }
}

