<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoice extends Component
{
    public $items = [
        [   
            'id' => '1',
            'name' => 'Apple MacBook Pro 17', 
            'price' => '2999', 
            'vat' => '19', 
            'ati_price' => '3500', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
        [   
            'id' => '2',
            'name' => 'Samsung Galaxy', 
            'price' => '2999', 
            'vat' => '19', 
            'ati_price' => '3500', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
        [   
            'id' => '3',
            'name' => 'Xiomi Redmi 7', 
            'price' => '2999', 
            'vat' => '19', 
            'ati_price' => '3500', 
            'quantity' => '1', 
            'amount' => '3500'
        ],
    ];

    public function render()
    {
        return view('livewire.invoice');
    }
}
