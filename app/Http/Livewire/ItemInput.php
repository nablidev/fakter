<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemInput extends Component
{

    public $num = 4;

    public $item_name = '';
    public $price = '0.000';
    public $item_vat_percent = '19';
    public $price_ev = '0.000';
    public $quantity = '1';
    public $amount_ev = '0.000';
    public $amount = '0.000';

    protected $rules = [
        'item_name' => 'required|max:256',
        'price' => 'required|numeric|gte:0|lte:1000000000',
        'item_vat_percent' => 'required|numeric|between:0,100',
        'price_ev' => 'required|numeric|gte:0|lte:1000000000',
        'quantity' => 'required|numeric|gte:0|lte:1000000000',
    ];

    public function updateAmount()
    {
        $new_amount_ev = floatval($this->price_ev) * floatval($this->quantity);

        $new_amount = floatval($this->price) * floatval($this->quantity);

        $this->amount_ev = number_format($new_amount_ev, 3, '.', '');

        $this->amount = number_format($new_amount, 3, '.', '');
    }

    public function updatePriceEVAndAmount()
    {
        
        $price_float_value = floatval($this->price);

        $item_vat_percent_float_value = floatval($this->item_vat_percent);

        $new_price_ev = $this->calculatePriceEVFromPriceAndVAT($price_float_value, $item_vat_percent_float_value);

        $this->price_ev = number_format($new_price_ev, 3, '.', '');

        $this->updateAmount();

    }

    public function updatePriceAndAmount()
    {
        $price_ev_float_value = floatval($this->price_ev);

        $item_vat_percent_float_value = floatval($this->item_vat_percent);

        $new_price = $this->calculatePriceFromPriceEVAndVAT($price_ev_float_value, $item_vat_percent_float_value);

        $this->price = number_format($new_price, 3, '.', '');

        $this->updateAmount();
    }

    public function submit()
    {
        
        $validatedData = $this->validate();

        $item_to_add = [
            'num' => $this->num++,
            'item_name' => $this->item_name, 
            'price' => $this->price, 
            'item_vat_percent' => $this->item_vat_percent, 
            'price_ev' => $this->price_ev, 
            'quantity' => $this->quantity, 
            'amount_ev' => $this->amount_ev,
            'amount' => $this->amount,
        ];


        $this->emit('itemAdded', $item_to_add);

        #initialize amount back to 0

        #maybe initialize other variables
    }

    public function updated()
    {
        #validate all field on every update
        $this->validate();
    }

    public function render()
    {
        return view('livewire.item-input');
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
