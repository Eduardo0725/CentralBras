<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SaveAddress extends Component
{
    public $title;
    public $id;
    public $method;
    public $route = null;
    public $cep = null;
    public $state = null;
    public $city = null;
    public $street = null;
    public $number = null;
    public $complement = null;
    public $phone = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Adicionar', $informations = null, $id = 'saveAddress', $method = 'POST')
    {
        $this->title = $title;
        $this->id = $id;
        $this->method = $method;
        $this->route = $method == 'POST' ? route('addresses.store') : route('addresses.update', ['address' => $informations['id']]);

        if ($informations) {
            $this->cep = $informations['cep'];
            $this->state = $informations['state'];
            $this->city = $informations['city'];
            $this->street = $informations['street'];
            $this->number = $informations['houseNumber'];
            $this->complement = $informations['complement'];
            $this->phone = $informations['phone'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.save-address');
    }
}
