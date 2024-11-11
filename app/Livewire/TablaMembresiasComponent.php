<?php

namespace App\Livewire;

use App\Models\membresias;
use Livewire\Component;
use Livewire\WithPagination;

class TablaMembresiasComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;

    public function render()
    {
        $membresias = membresias::where('nombre_membresia', 'like', '%' . $this->search . '%')
            ->latest('updated_at') 
            ->paginate($this->numberRows);

        return view('livewire.admin.membresias.tabla-membresias-component', [
            'membresias' => $membresias
        ]);
    }


}

