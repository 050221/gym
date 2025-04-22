<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TablaClientesComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $numberRows = 10;
    public $sortField = 'id'; // Campo por defecto para ordenar
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }


    public function render()
    {
        $query = User::select('id', 'name', 'firstname', 'lastname', 'gender', 'phone', 'email', 'status', 'updated_at')
            ->where('id', '!=', 1)
            ->where(function ($query) {
                $query->whereRaw("CONCAT(name, ' ', firstname, ' ', lastname) LIKE ?", ['%' . $this->search . '%'])
                      ->orWhere('gender', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('status', 'like', '%' . $this->search . '%');
            });
    
        if ($this->status !== '') {
            $query->where('status', $this->status);
        }
    
        $users = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->numberRows);
    
        // Agregar el número de fila a cada usuario
        $users->getCollection()->transform(function ($user, $index) use ($users) {
            $user->row_number = $index + 1 + $users->perPage() * ($users->currentPage() - 1);
            return $user;
        });
    
        return view('livewire.admin.users.tabla-clientes-component', compact('users'));
    }
    
}
