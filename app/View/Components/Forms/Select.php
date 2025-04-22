<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $classes;
    public $title;
    public $defaultOption; // Agregar esta propiedad

    public function __construct(
        $name,
        $label = null,
        $options = [],
        $selected = null,
        $classes = '',
        $title = '',
        $defaultOption = null // Agregar en el constructor
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
        $this->classes = $classes;
        $this->title = $title;
        $this->defaultOption = $defaultOption; // Asignarla
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
