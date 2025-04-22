<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;


class EditModal extends Component
{
    public $open = false;
    public $user_id, $name, $firstname, $lastname, $phone, $email, $status,  $gender, $birthdate;

    
    #[On('editUser')] // Sustituye $listeners
    public function loadUser($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->gender = $user->gender; 
        $this->birthdate = $user->birthdate;
        $this->open = true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'nullable|string|max:12|unique:users,phone,' . $this->user_id . '|regex:/^\d{3}-\d{3}-\d{4}$/',
            'birthdate' => 'nullable|date',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
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

    public function resetError()
    {
        $this->resetErrorBag(); // Limpia los errores de validación
        $this->open = false; // Cierra el modal
    }

    public function update()
    {
        $this->validate();

        User::where('id', $this->user_id)->update([
            'name' => $this->name,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'birthdate' => $this->birthdate,
        ]);

        return redirect()->to('clientes')
        ->with('success', 'Usuario Actualizado!');
        // Cambiar emit por dispatch
        $this->dispatch('userUpdated');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.users.edit-modal');
    }
}
