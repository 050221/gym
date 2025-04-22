<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusButton extends Component
{
    public string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }
    
    public function render(): View|Closure|string
    {
        return view('components.forms.status-button');
    }
}
