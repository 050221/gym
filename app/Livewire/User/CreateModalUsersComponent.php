<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;


class CreateModalUsersComponent extends Component
{

    public $open = false;
    public $name;
    public $firstname;
    public $lastname;
    public $gender;
    public $phone;
    public $birthdate;
    public $email;
    //public $password; 


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'nullable|string|max:12|unique:users,phone|regex:/^\d{3}-\d{3}-\d{4}$/',
            'birthdate' => 'nullable|date',
            'email' => 'required|string|email|max:255|unique:users,email',
            //'password' => 'required|string|min:8|max:255',
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
            'phone.max' => 'El número de teléfono no debe ser mayor a :max caracteres.',
            'phone.regex' => 'El número de teléfono debe tener el formato 000-000-0000.',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            //'password.required' => 'El campo contraseña es obligatorio.',
            //'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];
    }

    public function resetForm()
    {
        $this->reset(['name', 'firstname', 'lastname', 'gender', 'phone', 'email', 'birthdate']);
        $this->resetErrorBag(); // Limpia los errores de validación
        $this->open = false; // Cierra el modal
    }


    public function save()
    {

        $this->validate();

        $user = User::create([
            'name' => ucfirst($this->name),
            'firstname' => ucfirst($this->firstname),
            'lastname' => ucfirst($this->lastname),
            'gender' => $this->gender,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            //'password' => bcrypt($this->password),

        ])->assignRole('User');

        return redirect()->to('clientes')
            ->with('success', 'Usuario registrado!');
    }

    public function render()
    {
        return view('livewire.admin.users.create-modal-component');
    }
}
