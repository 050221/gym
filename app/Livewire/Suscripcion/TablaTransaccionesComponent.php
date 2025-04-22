<?php

namespace App\Livewire\Suscripcion;

use App\Models\transacciones;
use Livewire\Component;
use Livewire\WithPagination;


class TablaTransaccionesComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;
    public $sortField = 'id'; 
    public $sortDirection = 'desc'; 

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function render()
    {
        $query = Transacciones::query()
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
            ->orWhere('monto', 'like', '%' . $this->search . '%')
            ->orWhere('fecha_pago', 'like', '%' . $this->search . '%');
            
        });


        $transacciones = $query->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-transacciones-component', [
            'transacciones' => $transacciones
        ]);
    }
}
