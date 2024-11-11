<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttonExit extends Component
{
    public $href;
    public $text;
    public $classes;

    public function __construct($href, $text, $classes = '')
    {
        $this->href = $href;
        $this->text = $text;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.button-exit');
    }
}
