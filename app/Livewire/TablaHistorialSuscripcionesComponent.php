<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TablaHistorialSuscripcionesComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;

    public function render()
    {
        $query = DB::table('historial_suscripciones as hs')
            ->select('hs.id', DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"), 'm.nombre_membresia', 'hs.estado_anterior', 'hs.fecha_inicio', 'hs.fecha_fin')
            ->join('users as u', 'hs.user_id', '=', 'u.id')
            ->join('membresias as m', 'hs.membresia_id', '=', 'm.id')
            ->where(function ($query) {
                $query->where('u.name', 'like', '%' . $this->search . '%')
                    ->orWhere('u.firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('u.lastname', 'like', '%' . $this->search . '%')
                    ->orWhere('m.nombre_membresia', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.estado_anterior', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('hs.id', 'DESC');

        $historialSuscripciones = $query->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-historial-suscripciones-component', [
            'historialSuscripciones' => $historialSuscripciones
        ]);
    }
}
