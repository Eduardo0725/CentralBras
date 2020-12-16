<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateCard extends Component
{
    public $buttonClose;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($buttonClose = false)
    {
        $this->buttonClose = $buttonClose;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.create-card');
    }
}
