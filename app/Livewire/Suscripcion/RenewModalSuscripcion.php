<?php

namespace App\Livewire\Suscripcion;

use App\Models\historialSuscripciones;
use App\Models\Membresias;
use App\Models\suscripciones;
use App\Models\transacciones;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class RenewModalSuscripcion extends Component
{
    public $open = false;
    public $suscripcion_id, $status, $fecha_inicio, $fecha_fin, $user_id, $user_name, $membresia_id, $membresia_name;
    public $membresias;
    public $date_now;

    public function mount()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->date_now = Carbon::now()->toDateString();
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



    #[On('renewSuscripcion')] // Livewire 3 usa #[On] para eventos
    public function loadSuscripcion($id)
    {
        $suscripcion = suscripciones::with(['user:id,firstname,lastname,name', 'membresia:id,nombre'])->findOrFail($id);

        $this->suscripcion_id = $suscripcion->id;
        $this->status = $suscripcion->status;
        $this->fecha_inicio = $suscripcion->fecha_inicio;
        $this->fecha_fin = $suscripcion->fecha_fin;
        $this->user_id = $suscripcion->user->id;
        $this->user_name = "{$suscripcion->user->name} {$suscripcion->user->firstname} {$suscripcion->user->lastname}";
        $this->membresia_id = $suscripcion->membresia->id;
        $this->membresia_name = $suscripcion->membresia->nombre;
        $this->membresias = Membresias::all();


        $this->open = true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'membresia_id' => 'required',
            'fecha_inicio' => 'required|date|after_or_equal:' . $this->date_now,
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Seleccione un cliente, es obligatorio.',
            'membresia_id.required' => 'Seleccione una membresía, es obligatorio.',
            'fecha_inicio.required' => 'Agregue una fecha de inicio, es obligatorio.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio no puede ser anterior a la fecha actual.',
            'fecha_fin.required' => 'Agregue una fecha de finalización, es obligatorio.',
            'fecha_fin.after_or_equal' => 'La fecha de finalización no puede ser anterior a la fecha de inicio.',
        ];
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function renew()
    {
        /*try {
            $this->validate();
            // Si llega aquí, la validación pasó correctamente
            Log::info('Validación exitosa', $this->validate()); // Guarda en el log los datos validados
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación', ['errores' => $e->errors()]);
        }*/
        $this->validate();

        // 1️⃣ Obtener los datos antiguos antes de la actualización
        $oldData = suscripciones::findOrFail($this->suscripcion_id)->toArray();

        // 2️⃣ Actualizar la suscripción
        suscripciones::where('id', $this->suscripcion_id)->update([
            'status' => "Activa",
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'membresia_id' => $this->membresia_id,
        ]);



        // 3️⃣ Guardar los datos antiguos en el historial, solo si estaba activa
        if ($oldData['status'] === 'Activa') {
            historialSuscripciones::create([
                'user_id' => $oldData['user_id'],
                'membresia_id' => $oldData['membresia_id'],
                'fecha_inicio' => $oldData['fecha_inicio'],
                'fecha_fin' => $oldData['fecha_fin'],
                'estado_anterior' => $oldData['status'],
            ]);
        }


        // 4️⃣ Registrar la transacción  ✅ Acceder como array
        transacciones::create([
            'suscripcion_id' => $oldData['id'],  // ✅ Acceder como array
            'user_id' => $oldData['user_id'],    // ✅ Acceder como array
            'membresia_id' => $this->membresia_id,
            'status' => 'Completado',
            'monto' => $this->calcularMonto($this->membresia_id),
            'fecha_pago' => now(),
        ]);

        // 5️⃣ Actualizar el estado del usuario a 'Activo'
        $user = \App\Models\User::findOrFail($oldData['user_id']);
        $user->status = 'Activo';
        $user->save();


        $this->open = false;
        $this->dispatch('suscripcionUpdated');
        //$this->dispatch('suscripcionUpdated')->to(TablaSuscripcionesComponent::class);
        return redirect()->to('suscripciones')
            ->with('success', 'La suscripción ha sido renovada correctamente!');
    }


    private function calcularMonto($membresia_id)
    {
        $membresia = Membresias::find($membresia_id);
        return $membresia ? $membresia->precio : 0;
    }

    public function render()
    {
        return view('livewire.admin.suscripciones.renew-modal-suscripciones', ['date_now' => $this->date_now]);
    }
}
