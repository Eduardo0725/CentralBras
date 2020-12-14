<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductRow extends Component
{
    public $productId;
    public $shoppingCartId;
    public $imageSrc;
    public $name;
    public $variations;
    public $amountSelected;
    public $price;
    public $productAmount;
    public $amount;
    public $links;
    public $addCart;
    public $qtd;
    public $type;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $type = null, bool $amount = false, bool $links = true, bool $addCart = false, bool $qtd = false)
    {
        $this->productId = $product->id;
        $this->shoppingCartId = $product->idShoppingCart;
        $this->imageSrc = env('APP_STORAGE') . ($product->midia[0]->type != 'video' ? $product->midia[0]->path : $product->midia[1]->path);
        $this->name = $product->name;
        $this->variations = $product->variations;
        $this->amountSelected = $product->amountSelected ?? 1;
        $this->price = $product->cost;
        $this->productAmount = $product->amount;
        $this->type = $type;

        if ($type == 'shoppingCart')
            $this->route = [
                'delete' => route('shoppingCart.delete', ['idProduct' => $product->id, 'idShoppingCart' => $product->idShoppingCart])
            ];

        if ($type == 'favorite')
            $this->route = [
                'delete' => route('favorite.delete', ['idProduct' => $product->id])
            ];

        $this->amount = $amount;
        $this->links = $links;
        $this->addCart = $addCart;
        $this->qtd = $qtd;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-row');
    }
}
