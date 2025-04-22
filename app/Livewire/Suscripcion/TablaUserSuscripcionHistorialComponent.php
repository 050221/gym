<?php

namespace App\Livewire\Suscripcion;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TablaUserSuscripcionHistorialComponent extends Component
{

    use WithPagination;

    public $search = '';
    public $numberRows = 5;


    

    public function render()
    {

        $userId = auth()->id();


        $suscripcion = DB::table('suscripciones as s')
        ->select('s.id', 's.fecha_inicio', 's.fecha_fin', DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"), 'm.nombre_membresia', 'm.descripcion','m.precio')
        ->join('users as u', 's.user_id', '=', 'u.id')
        ->join('membresias as m', 's.membresia_id', '=', 'm.id')
        ->where('u.id', '=', $userId) 
        ->get();
    

        $query = DB::table('historial_suscripciones as hs')
            ->select('hs.id', 'u.name as nombre_cliente', 'm.nombre_membresia','m.precio', 'hs.estado_anterior', 'hs.fecha_inicio', 'hs.fecha_fin')
            ->join('users as u', 'hs.user_id', '=', 'u.id')
            ->join('membresias as m', 'hs.membresia_id', '=', 'm.id')
            ->where('hs.user_id', $userId)
            ->where(function ($query) {
                $query->orWhere('m.nombre_membresia', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.estado_anterior', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('hs.fecha_fin', 'asc');

        $historialSuscripciones = $query->paginate($this->numberRows);

        return view('livewire.user.tabla-user-suscripcion-historial-component', [
            'historialSuscripciones' => $historialSuscripciones,
            'suscripcion' => $suscripcion
        ]);
    }
}
