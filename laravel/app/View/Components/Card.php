<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $id;
    public $name;
    public $midia;
    public $interest;
    public $discount;
    public $price;
    public $stars;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->midia = $product->midia ? env('APP_STORAGE') . $product->midia[0]->path : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxHV_dPPk2Bp8xzVW93wOPaL4iCj3J-4KNUQ&usqp=CAU';
        $this->interest = $product->interest ?? '';
        $this->discount = $product->discount ?? '';
        $this->price = number_format($product->cost, 2, ',', '.');
        $this->stars = 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
