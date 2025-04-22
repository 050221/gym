<?php

namespace App\Livewire\Suscripcion;

use App\Models\historialSuscripciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TablaHistorialSuscripcionesComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;
    public $sortField = 'id'; // Campo por defecto para ordenar
    public $sortDirection = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }


    public function render()
    {
        $query = historialSuscripciones::with(['user', 'membresia'])  // Cargar las relaciones 'user' y 'membresia'
            ->select('id', 'user_id', 'membresia_id', 'estado_anterior', 'fecha_inicio', 'fecha_fin', 'created_at')
            ->where(function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('firstname', 'like', '%' . $this->search . '%')
                        ->orWhere('lastname', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('membresia', function ($q) {
                        $q->where('nombre', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('estado_anterior', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_fin', 'like', '%' . $this->search . '%');
            });
        //->orderBy('id', 'DESC');

        $historialSuscripciones = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-historial-suscripciones-component', [
            'historialSuscripciones' => $historialSuscripciones
        ]);
    }
}
