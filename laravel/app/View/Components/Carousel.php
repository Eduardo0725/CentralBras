<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;
use stdClass;

class Carousel extends Component
{
    public $title;
    public $contents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $search = null)
    {
        $products = new Product;

        $request = new stdClass();

        $request->search = $search;
        $request->options = $search ? null : [
            'sales',
            'take' => 16
        ];

        $products = $products->search($request);

        foreach ($products as $key => $product) {
            $products[$key]->midia = $product->midia()->where('type', 'image')->get()->all();
        }

        $this->contents = $products;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
