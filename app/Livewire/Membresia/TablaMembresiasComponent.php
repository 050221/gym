<?php

namespace App\Livewire\Membresia;

use App\Models\membresias;
use Livewire\Component;
use Livewire\WithPagination;

class TablaMembresiasComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;
    public $sortField = 'id'; // Campo por defecto para ordenar
    public $sortDirection = 'asc';

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
        $query = membresias::where('nombre', 'like', '%' . $this->search . '%');


        // Aplicar orden dinámico
        $membresias = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->numberRows);

        return view('livewire.admin.membresias.tabla-membresias-component', [
            'membresias' => $membresias
        ]);
    }
}
