<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class DeleteUser extends Component
{
    protected $listeners = ['deleteUser'];

    public function deleteUser($userId)
    {
        User::find($userId)?->delete();
        
        // Dispara un evento para mostrar la alerta sin actualizar la lista
        $this->dispatchBrowserEvent('deleted');
    }
}

