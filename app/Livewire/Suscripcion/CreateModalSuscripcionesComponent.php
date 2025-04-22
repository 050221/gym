<?php

namespace App\Livewire\Suscripcion;

use Livewire\Component;
use App\Models\User;
use App\Models\membresias;
use App\Models\suscripciones;
use App\Models\transacciones;
use Illuminate\Support\Carbon;



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

        // Obtener la fecha actual en la zona horaria de Ciudad de México
        $this->date_now = Carbon::now()->toDateString(); // Ahora con Carbon importado

        // Puedes asignar la fecha actual también a $fecha_inicio si es necesario
        $this->fecha_inicio = $this->date_now;
    }


    public function updatedFechaInicio($value)
    {
        // Recuperar la membresía seleccionada utilizando el valor actual de membresia_id.
        $membresia = membresias::find($this->membresia_id);

        // Si la membresía es 'Visita Única' se actualiza la fecha fin para que coincida.
        if ($membresia && $membresia->duracion_meses === 'Visita') {
            $this->fecha_fin = $value;
        }
    }



    public function updatedMembresiaId($value)
    {
        // Obtener la membresía correspondiente al id seleccionado.
        $membresia = membresias::find($value);

        // Comprobar que la membresía exista y que su nombre sea 'Visita Única'
        if ($membresia && $membresia->duracion_meses === 'Visita') {
            // Si no se ha definido fecha_inicio, se asigna la fecha actual.
            if (!$this->fecha_inicio) {
                $this->fecha_inicio = $this->date_now;
            }
            // Se establece la fecha fin igual a fecha inicio.
            $this->fecha_fin = $this->fecha_inicio;
        }
    }



    public function render()
    {
        $clientes = User::whereDoesntHave('suscripciones')
            ->where('id', '!=', 1)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->selectRaw("id, CONCAT(name, ' ', firstname, ' ', lastname) as name")
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
            'user_id' => 'required|numeric',
            'membresia_id' => 'required|numeric|exists:membresias,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Seleccione un cliente, es obligatorio.',
            'user_id.numeric' => 'El cliente seleccionado no es válido.',
            'membresia_id.required' => 'El campo de la membresía es obligatorio.',
            'membresia_id.numeric' => 'El campo de la membresía debe ser un número válido.',
            'membresia_id.exists' => 'La membresía seleccionada no existe en nuestros registros.',
            'fecha_inicio.required' => 'Agregue una fecha de inicio, es obligatorio.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio no puede ser anterior a la fecha actual.',
            'fecha_fin.required' => 'Agregue una fecha de finalización, es obligatorio.',
            'fecha_fin.after_or_equal' => 'La fecha de finalización no puede ser anterior a la fecha de inicio.',
        ];
    }

    public function resetForm()
    {
        $this->reset(['user_id', 'membresia_id', 'fecha_fin']);
        $this->resetErrorBag();
        $this->open = false;
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
            'fecha_pago' =>  $this->fecha_inicio,
        ]);

        // Actualizar el estado del usuario a 'Activo'
        $user = User::find($this->user_id);
        $user->status = "Activo";
        $user->save();

        return redirect()->to('suscripciones')->with('success', 'Suscripción registrada!');
    }
}
