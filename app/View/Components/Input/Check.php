<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Check extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'checkbox',
        public string $name = '',
        public ?string $id = null,
        public ?string $label = null,
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.check');
    }
}
