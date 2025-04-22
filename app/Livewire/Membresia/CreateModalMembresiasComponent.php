<?php

namespace App\Livewire\Membresia;

use Livewire\Component;
use App\Models\membresias;

class CreateModalMembresiasComponent extends Component
{

    public $open = false;
    public $nombre; 
    public $descripcion;  
    public $duracion_meses;
    public $precio; 

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2048',
            'duracion_meses' => 'required|string|max:48',
            'precio' => 'required|numeric|min:0|max:6000',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre de membresia es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'duracion_meses.required' => 'El campo duración es obligatorio.',
            'duracion_meses.max' => 'El campo duración no puede ser mayor a 48 caracteres.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio no puede ser menor a 0.',
            'precio.max' => 'El campo precio no puede ser mayor a 6000.',
            'precio.required' => 'El campo precio es obligatorio.',
        ];
    }

    public function resetForm()
    {
        $this->reset(['nombre', 'descripcion', 'duracion_meses', 'precio']);
        $this->resetErrorBag(); 
        $this->open = false; 
    }


    public function save(){

        $this->validate();

        $membresia = membresias::create([
            'nombre'=> $this->nombre,   
            'descripcion'=>$this->descripcion,
            'duracion_meses'=>$this->duracion_meses,
            'precio'=>$this->precio,
        ]);

        return redirect()->to('membresias')
        ->with('success', 'Membresia registrada!');
    }


    public function render()
    {
        return view('livewire.admin.membresias.create-modal-membresias-component');
    }
}
