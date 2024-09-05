<?php

namespace App\View\Components\Link;

use App\View\Components\Link;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Turbo extends Link
{
    public string $turboAttributes = '';
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href = '#',
        public string $target = '_self',
        public string $icon = '',
        public array $dataTurbo = [],
    )
    {
        $this->makeDataTurboAttr();

        parent::__construct($href, $target, $icon);
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
}
