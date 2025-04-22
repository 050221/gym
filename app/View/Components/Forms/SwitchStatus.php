<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SwitchStatus extends Component
{
    public ?string $status; // Permitir null

    public function __construct(?string $status = 'Activa') // Valor predeterminado
    {
        $this->status = $status ?? 'Activa';
    }
    public function render(): View|Closure|string
    {
        return view('components.forms.switch-status');
    }
}
