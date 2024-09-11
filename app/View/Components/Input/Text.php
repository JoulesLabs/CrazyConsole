<?php

namespace App\View\Components\Input;

use App\View\Components\Input;
use Closure;
use Illuminate\Contracts\View\View;

class Text extends Input
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'text',
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
        return view('components.input');
    }
}
