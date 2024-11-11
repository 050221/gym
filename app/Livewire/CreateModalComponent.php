<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class CreateModalComponent extends Component
{

    public $open = false;
    public $name; 
    public $firstname;  
    public $lastname;
    public $gender; 
    public $phone; 
    public $email; 
    public $password; 
 

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:2048',
            'lastname' => 'required|string|max:2048',
            'gender' => 'required|string|max:2048',
            'phone' => 'required|string|max:12|unique:users,phone',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'firstname.required' => 'El campo apellido paterno es obligatorio.',
            'lastname.required' => 'El campo apellido materno es obligatorio.',
            'gender.required' => 'El campo género es obligatorio.',
            'phone.required' => 'Este número de teléfono es obligatorio.',
            'phone.unique' => 'Este número de teléfono ya está registrado.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];
    }


    public function save(){

        $this->validate();

        $user = User::create([
            'name'=> $this->name,   
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'gender'=>$this->gender,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'password' => bcrypt($this->password),

        ])->assignRole('User');

        return redirect()->to('clientes')
        ->with('success', 'Usuario registrado!');
    }

    public function render()
    {
        return view('livewire.admin.users.create-modal-component');
    }
}
