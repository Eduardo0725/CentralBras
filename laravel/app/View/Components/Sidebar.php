<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $types = [
            'shopping' => null,
            'sales' => null,
            'configurations' => null
        ];

        $types[$type] = 'active';

        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
