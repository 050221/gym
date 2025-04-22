<?php

namespace App\Livewire\Suscripcion;

use App\Models\suscripciones;
use Livewire\Component;
use Livewire\WithPagination;

class TablaSuscripcionesComponent extends Component
{
    public $search = '';
    public $status = ''; 
    use WithPagination;
    public $numberRows = 10;
    public $sortField = 'fecha_fin'; // Campo por defecto para ordenar
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
        $query = Suscripciones::query()
        ->with(['user', 'membresia'])
        ->where(function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('firstname', 'like', '%' . $this->search . '%')
                      ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('membresia', function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%');
            })
            ->orWhere('fecha_inicio', 'like', '%' . $this->search . '%')
            ->orWhere('fecha_fin', 'like', '%' . $this->search . '%');
        });

        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        // Aplicar orden dinámico
        $suscripciones = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-suscripciones-component', [
            'suscripciones' => $suscripciones
        ]);
    }
}
