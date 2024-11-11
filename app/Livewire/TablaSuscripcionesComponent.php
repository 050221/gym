<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TablaSuscripcionesComponent extends Component
{
    public $search = '';
    public $status = ''; 
    use WithPagination;
    public $numberRows = 10;


    public function render()
    {

        $query = DB::table('suscripciones as s')
            ->select('s.id', 
            DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"), 'm.nombre_membresia','s.status', 's.fecha_inicio', 's.fecha_fin')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->join('membresias as m', 's.membresia_id', '=', 'm.id')
            ->where('s.status', '=', 'Activa')
            ->where(function ($query) {
                $query->where('u.name', 'like', '%' . $this->search . '%')
                    ->orWhere('u.firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('u.lastname', 'like', '%' . $this->search . '%')
                    ->orWhere('m.nombre_membresia', 'like', '%' . $this->search . '%')
                    ->orWhere('s.fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('s.fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('s.fecha_inicio',('desc'));

        if ($this->status !== '') {
            $query->where('s.status', $this->status);
        }

        $suscripciones = $query->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-suscripciones-component', [
            'suscripciones' => $suscripciones
        ]);
    }
}
