<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $class = 'btn';
    /**
     * Create a new component instance.
     */
    public function __construct(public string $button = '', public string $type = 'button', public string $size = 'md')
    {
        $this->class .= ' btn-' . $this->button;
        $this->class .= ' btn-' . $this->size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
