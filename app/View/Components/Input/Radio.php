<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Check
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'radio',
        public string $name = '',
        public ?string $id = null,
        public ?string $label = null,
    )
    {
        parent::__construct($type, $name, $id, $label);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.check');
    }
}
