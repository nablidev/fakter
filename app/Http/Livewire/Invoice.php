<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoice extends Component
{
    public $item_name;
    public $price;
    public $vat;
    public $price_ev;
    public $quantity;
    
    protected $listeners = ['priceUpdated' => 'updatePriceEV'];

    public $items = [
        [   
            'id' => '1',
            'item_name' => 'Apple MacBook Pro 17', 
            'price' => '3500', 
            'vat' => '19', 
            'price_ev' => '2999', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
        [   
            'id' => '2',
            'item_name' => 'Samsung Galaxy', 
            'price' => '3500', 
            'vat' => '19', 
            'price_ev' => '2999', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
        [   
            'id' => '3',
            'item_name' => 'Xiomi Redmi 7', 
            'price' => '2999', 
            'vat' => '19', 
            'price_ev' => '3500', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
    ];

    public function updatePriceEV()
    {
        $float_value = floatval($this->price);

        $this->price_ev = $float_value / 2;
    }

    public function submit()
    {
        
        $this->items[] = [
            'id' => '4',
            'item_name' => $this->item_name, 
            'price' => $this->price, 
            'vat' => $this->vat, 
            'price_ev' => $this->price_ev, 
            'quantity' => $this->quantity, 
            'amount' => '3500'
        ];
        
    }

    public function render()
    {
        return view('livewire.invoice');
    }
}
