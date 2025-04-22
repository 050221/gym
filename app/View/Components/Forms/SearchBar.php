<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
    public $name;
    public $placeholder;
    public $classes;

    public function __construct($name = 'search', $placeholder = 'Buscar...', $classes = '')
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->classes = $classes;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.search-bar');
    }
}

