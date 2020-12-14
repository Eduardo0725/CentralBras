<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoxOfNumbers extends Component
{
    public $pName;
    public $inputName;
    public $inputValue;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pName = null, $inputName = null, $inputValue = 1)
    {
        $this->pName = $pName;
        $this->inputName = $inputName;
        $this->inputValue = $inputValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.box-of-numbers');
    }
}
