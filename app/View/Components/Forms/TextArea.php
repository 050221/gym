<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $placeholder;
    public $rows;
    public $classes;

    public function __construct($name, $placeholder = 'Escribe aquí...', $rows = 4, $classes = '')
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->classes = $classes;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.text-area');
    }
}
