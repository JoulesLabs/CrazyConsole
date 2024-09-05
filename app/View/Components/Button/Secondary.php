<?php

namespace App\View\Components\Button;

use App\View\Components\Button;
use Closure;
use Illuminate\Contracts\View\View;

class Secondary extends Button
{
    public function __construct(public string $button = 'secondary', public string $type = 'button', public string $size = 'md')
    {
        parent::__construct($button, $type, $size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
