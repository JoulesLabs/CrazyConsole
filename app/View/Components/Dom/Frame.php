<?php

namespace App\View\Components\Dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Frame extends Component
{
    public string $turboAttributes = '';
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public ?string $controller = null,
        public array $dataTurbo = [],
    )
    {
        $this->makeDataTurboAttr();
    }


    protected function makeDataTurboAttr()
    {
        $defaultAttrs = [
            'target' => 'main-frame',
            'action' => 'advance',
        ];

        $attrs = '';

        $this->dataTurbo = array_merge($defaultAttrs, $this->dataTurbo);

        if ($this->dataTurbo['action'] === 'replace') {
            unset($this->dataTurbo['target']);
        }

        foreach ($this->dataTurbo as $key => $value) {
            if (is_int($key)) {
                $attrs .= "data-turbo=\"$value\" ";
            } else {
                $attrs .= "data-turbo-$key=\"$value\" ";
            }

        }

        $this->turboAttributes = $attrs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.frame');
    }
}
