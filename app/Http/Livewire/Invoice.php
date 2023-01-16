<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoice extends Component
{
    public $item_name = '';
    public $price = '0';
    public $vat = '19';
    public $price_ev = '0';
    public $quantity = '1';
    public $amount = '0';

    public $num = 4;
    public $total = 0;

    protected $rules = [
        'item_name' => 'required|max:2048',
        'price' => 'required',
        'vat' => 'required|min:0|max:100'
    ];

    
    protected $listeners = [
        'priceUpdated' => 'updatePriceEVAndAmount',
        'priceEVUpdated' => 'updatePriceAndAmount',
        'vatUpdated' => 'updatePriceAndAmount',
        'quantityUpdated' => 'updateAmount',
    ];

    public $items = [
        [   
            'num' => 1,
            'item_name' => 'Apple MacBook Pro 17', 
            'price' => '1500', 
            'vat' => '19', 
            'price_ev' => '1260.504', 
            'quantity' => '1', 
            'amount' => '1500'
        ],
        [   
            'num' => 2,
            'item_name' => 'Samsung Galaxy', 
            'price' => '700', 
            'vat' => '19', 
            'price_ev' => '588.235', 
            'quantity' => '1', 
            'amount' => '700'
        ],
        [   
            'num' => 3,
            'item_name' => 'Xiomi Redmi 7', 
            'price' => '600', 
            'vat' => '19', 
            'price_ev' => '504.202', 
            'quantity' => '1', 
            'amount' => '600'
        ],
    ];

    

    public function updateAmount()
    {
        $newAmount = floatval(str_replace(',','',$this->price)) * floatval(str_replace(',','',$this->quantity));

        $this->amount = number_format($newAmount, 3);
    }

    public function updatePriceAndAmount()
    {
        $price_ev_float_value = floatval(str_replace(',','',$this->price_ev));

        $vat_float_value = floatval(str_replace(',','',$this->vat));

        $new_price = $this->calculatePriceFromPriceEVAndVAT($price_ev_float_value, $vat_float_value);

        $this->price = number_format($new_price, 3);

        $this->updateAmount();
    }

    public function updatePriceEVAndAmount()
    {

        $price_float_value = floatval(str_replace(',','',$this->price));

        $new_price_ev = $this->calculatePriceEVFromPriceAndVAT($price_float_value, $this->vat);

        $this->price_ev = number_format($new_price_ev, 3);

        $this->updateAmount();

    }
    

    public function submit()
    {
        #using str_replace to replace ',' with '' so that floatval don't mistake ',' as decimal point separators for numbers
        #that have more than 3 decimals
        
        $this->items[] = [
            'num' => $this->num++,
            'item_name' => $this->item_name, 
            'price' => number_format(floatval(str_replace(',','',$this->price)), 3), 
            'vat' => $this->vat, 
            'price_ev' => number_format(floatval(str_replace(',','',$this->price_ev)), 3), 
            'quantity' => $this->quantity, 
            'amount' => number_format(floatval(str_replace(',','',$this->amount)), 3),
        ];
        
    }

    public function render()
    {
        return view('livewire.invoice');
    }

    private function calculatePriceEVFromPriceAndVAT($price, $vat)
    {
        $price_ev = $price - ($price / (100 + $vat)) * $vat;

        return $price_ev;
    }

    private function calculatePriceFromPriceEVAndVAT($price_ev, $vat)
    {
        $price = ($price_ev / 100) * $vat + $price_ev;

        return $price;
    }
    
}
