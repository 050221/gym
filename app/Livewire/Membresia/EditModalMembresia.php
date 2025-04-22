<?php

namespace App\Livewire\Membresia;

use App\Models\membresias;
use Livewire\Component;
use Livewire\Attributes\On;

class EditModalMembresia extends Component
{

    public $open = false;
    public $membresia_id, $nombre, $descripcion, $duracion_meses, $precio;


    #[On('editMembresia')]
    public function loadMembresia($id)
    {
        $membresia = membresias::findOrFail($id);
        $this->membresia_id = $membresia->id;
        $this->nombre = $membresia->nombre;
        $this->descripcion = $membresia->descripcion;
        $this->duracion_meses = $membresia->duracion_meses;
        $this->precio = $membresia->precio;
        $this->open = true;
    }
    
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2048',
            'duracion_meses' => 'required',
            'precio' => 'required|numeric|min:0|max:6000',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre de membresia es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'duracion_meses.required' => 'El campo duración es obligatorio.',
            'duracion_meses.numeric' => 'El campo duración debe ser un número.',
            'duracion_meses.min' => 'El campo duración debe ser mayor a 0.',
            'duracion_meses.max' => 'El campo duración no puede ser mayor a 48 caracteres.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio no puede ser menor a 0.',
            'precio.max' => 'El campo precio no puede ser mayor a 6000.',
            'precio.required' => 'El campo precio es obligatorio.',
        ];
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2048',
            'duracion_meses' => 'required',
            'precio' => 'required|numeric|min:0|max:6000',
        ]);

        membresias::where('id', $this->membresia_id)->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'duracion_meses' => $this->duracion_meses,
            'precio' => $this->precio,
        ]);

        return redirect()->to('membresias')
        ->with('success', 'Membresía actualizada!');
        // Cerrar el modal y restablecer el estado
        $this->open = false;

        // Emitir evento para notificar al componente padre que la membresía fue actualizada
        $this->dispatch('membresiaUpdated');
    }

    public function render()
    {
        return view('livewire.admin.membresias.edit-modal-membresias');
    }
}
