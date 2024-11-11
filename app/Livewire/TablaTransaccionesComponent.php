<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TablaTransaccionesComponent extends Component
{
    public $search = '';
    use WithPagination;
    public $numberRows = 10;

    public function render()
    {
        $transacciones = DB::table('transacciones as t')
        ->select('t.id', 
                 DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"),
                 'm.nombre_membresia',
                 't.status',
                 't.monto',
                 't.fecha_pago')
        ->join('users as u', 'u.id', '=', 't.user_id')
        ->join('membresias as m', 'm.id', '=', 't.membresia_id')
        ->where(function ($transacciones) {
            $transacciones->where('u.name', 'like', '%' . $this->search . '%')
            ->orWhere('u.firstname', 'like', '%' . $this->search . '%')
            ->orWhere('u.lastname', 'like', '%' . $this->search . '%')
            ->orWhere('m.nombre_membresia', 'like', '%' . $this->search . '%')
            ->orWhere('t.status', 'like', '%' . $this->search . '%')
            ->orWhere('t.monto', 'like', '%' . $this->search . '%')
            ->orWhere('t.fecha_pago', 'like', '%' . $this->search . '%');
            })
        ->orderBy('t.id', 'desc') 
        ->paginate($this->numberRows);

        return view('livewire.admin.suscripciones.tabla-transacciones-component', [
            'transacciones' => $transacciones
        ]);
    }
}
