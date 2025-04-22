<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputPassword extends Component
{
    /**
     * Atributos personalizables del componente.
     */
    public string $name;
    public string $id;
    public string $placeholder;

    /**
     * Crear una nueva instancia del componente.
     */
    public function __construct(
        string $name = 'password',
        string $id = 'password',
        string $placeholder = 'Ingrese su contraseña'
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.input-password');
    }
}
