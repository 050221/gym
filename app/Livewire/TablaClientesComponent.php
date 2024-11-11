<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TablaClientesComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $numberRows = 10;

    public function render()
    {
        $query = User::select('id', 'name', 'firstname', 'lastname', 'gender',  'phone', 'email','status', 'updated_at')
        ->where('id', '!=', 1) 
        ->where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('firstname', 'like', '%' . $this->search . '%')
                  ->orWhere('lastname', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('status', 'like', '%' . $this->search . '%');
        })
        ->orderBy('name', 'asc');


        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        $users = $query->paginate($this->numberRows);

        return view('livewire.admin.users.tabla-clientes-component', compact('users'));
    }
}
