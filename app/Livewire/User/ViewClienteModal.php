<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class ViewClienteModal extends Component
{

    public $open = false;
    public $user_id, $name, $firstname, $lastname, $phone, $email, $status,  $gender, $birthdate;

    
    #[On('viewUser')] 
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


    public function cerrar()
    {
        $this->open = false;
    }



    public function render()
    {
        return view('livewire.admin.users.view-cliente-modal');
    }
}
