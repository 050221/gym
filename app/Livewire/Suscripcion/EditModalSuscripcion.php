<?php

namespace App\Livewire\Suscripcion;

use App\Models\historialSuscripciones;
use App\Models\membresias;
use App\Models\suscripciones;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;


class EditModalSuscripcion extends Component
{
    
    public $open = false;
    public $suscripcion_id, $status, $fecha_inicio, $fecha_fin, $user_id,$user_name, $membresia_id, $membresia_name;
    public $membresias ;
    public $date_now;

    public function mount()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->date_now = Carbon::now()->toDateString();
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

    #[On('editSuscripcion')] 
    public function loadSuscripcion($id)
    {
       
        $suscripcion = suscripciones::with(['user:id,firstname,lastname,name', 'membresia:id,nombre'])
            ->findOrFail($id);

        $this->suscripcion_id = $suscripcion->id;
        $this->status = $suscripcion->status;
        $this->fecha_inicio = $suscripcion->fecha_inicio;
        $this->fecha_fin = $suscripcion->fecha_fin;
        $this->user_id = $suscripcion->user->id;
        $this->user_name = $suscripcion->user->name . ' ' .$suscripcion->user->firstname . ' ' . $suscripcion->user->lastname; // Nombre completo del usuario
        $this->membresia_id = $suscripcion->membresia->id;
        $this->membresia_name = $suscripcion->membresia->nombre; 
        $this->membresias = Membresias::all();

        $this->open = true;
    }


    public function rules()
    {
        return [
            'fecha_inicio' => 'required|date', 
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', 
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required' => 'Agregue una fecha de inicio, es obligatorio.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio no puede ser anterior a la fecha actual.',
            'fecha_fin.required' => 'Agregue una fecha de finalización, es obligatorio.',
            'fecha_fin.after_or_equal' => 'La fecha de finalización no puede ser anterior a la fecha de inicio.',
        ];
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->open = false;
    }


    public function update()
    {
        $this->validate();
 
        $suscripcion = suscripciones::findOrFail($this->suscripcion_id);

        historialSuscripciones::create([
            'user_id' => $suscripcion->user_id,
            'membresia_id' => $suscripcion->membresia_id,
            'fecha_inicio' =>  $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado_anterior' => 'Modificada'
        ]);

        $suscripcion->fecha_inicio = $this->fecha_inicio;
        $suscripcion->fecha_fin = $this->fecha_fin;
        $suscripcion->save();

        return redirect()->to('suscripciones')
            ->with('success', 'Suscripción actualizada!');
        // Cerrar el modal y restablecer el estado
        $this->open = false;
        $this->resetErrorBag();

        // Emitir evento para notificar al componente padre que la membresía fue actualizada
        $this->dispatch('suscripcionUpdated');
    }

    public function render()
    {
        return view('livewire.admin.suscripciones.edit-modal-suscripciones', [
            'date_now' => $this->date_now
        ]);
    }
}