<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\membresias;

class CreateModalMembresiasComponent extends Component
{

    public $open = false;
    public $nombre_membresia; 
    public $descripcion;  
    public $duracion;
    public $precio; 

    public function rules()
    {
        return [
            'nombre_membresia' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2048',
            'duracion' => 'required|string|max:48',
            'precio' => 'required|numeric|max:5000',

        ];
    }

    public function messages()
    {
        return [
            'nombre_membresia.required' => 'El campo nombre de membresia es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'duracion.required' => 'El campo duración es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
        ];
    }



    public function save(){

        $this->validate();

        $membresia = membresias::create([
            'nombre_membresia'=> $this->nombre_membresia,   
            'descripcion'=>$this->descripcion,
            'duracion'=>$this->duracion,
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
