<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\membresias;
use App\Models\suscripciones;
use App\Models\transacciones;
    

class CreateModalSuscripcionesComponent extends Component
{
    public $open = false;
    public $search = '';
    public $user_id;
    public $membresia_id;
    public $status = 'Activa';
    public $fecha_inicio;
    public $fecha_fin;
    public $date_now;

    public function mount()
    {
        // Establecer la zona horaria a Ciudad de México
        date_default_timezone_set('America/Mexico_City');

        // Obtener la fecha actual en la zona horaria de Ciudad de México y asignarla a $date_now
        $this->date_now = now()->toDateString(); // Opcional: Para obtener solo la fecha

        // Puedes asignar la fecha actual también a $fecha_inicio o $fecha_fin si es necesario
        $this->fecha_inicio = $this->date_now;
    }

    
    public function render()
    {
        $clientes = User::whereNotExists(function ($query) {
                $query->select('user_id')
                    ->from('suscripciones')
                    ->whereRaw('suscripciones.user_id = users.id');
            })
            ->where('name', '!=', 'Admin')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->select('id', 'name', 'firstname', 'lastname')
            ->orderBy('name')
            ->orderBy('firstname')
            ->orderBy('lastname')
            ->get();
    
        $membresias = membresias::all();
    
        return view('livewire.admin.suscripciones.create-modal-suscripciones-component', [
            'clientes' => $clientes, 
            'membresias' => $membresias, 
            'date_now' => $this->date_now
        ]);
    }


    public function rules()
    {
        return [
            'user_id' => 'required|string|max:255|unique:suscripciones,user_id',
            'membresia_id' => 'required|string|max:2048',
            'fecha_inicio' => 'required|string|max:2048',
            'fecha_fin' => 'required|string|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Seleccione un cliente, es obligatorio.',
            'membresia_id.required' => 'Seleccione una membresia es obligatorio.',
            'fecha_inicio.required' => 'Agrege una fecha, es obligatorio.',
            'fecha_fin.required' => 'Agrege una fecha, es obligatorio.',
        ];
    }


    public function save()
    {
        $this->validate();
    
        // Crear la suscripción
        $suscripcion = suscripciones::create([
            'user_id' => $this->user_id,   
            'membresia_id' => $this->membresia_id,
            'status' => 'Activa',
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ]);
    
        // Obtener el precio de la membresía
        $membresia = membresias::find($this->membresia_id);
        $monto = $membresia->precio; 
        
        $user_id = $suscripcion->user_id;

    
        // Crear la transacción asociada a la suscripción
        $transaccion = transacciones::create([
            'suscripcion_id' => $suscripcion->id,
            'user_id' => $user_id,
            'membresia_id' => $this->membresia_id,
            'status' => 'Completado', 
            'monto' => $monto,
            'fecha_pago' => now(), 
        ]);
    
        // Actualizar el estado del usuario a 'Activo'
        $user = User::find($this->user_id);
        $user->status = "Activo";
        $user->save();
    
        return redirect()->to('suscripciones')->with('success', 'Suscripción registrada!');
    }


}

