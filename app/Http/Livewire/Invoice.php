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
    public $total = '2800';

    protected $rules = [
        'item_name' => 'required|max:512',
        'price' => 'required|numeric|gte:0|lte:1000000000',
        'vat' => 'required|numeric|between:0,100',
        'price_ev' => 'required|numeric|gte:0|lte:1000000000',
        'quantity' => 'required|numeric|gte:0|lte:1000000000'
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
        $newAmount = floatval($this->price) * floatval($this->quantity);

        $this->amount = number_format($newAmount, 3, '.', '');
    }

    public function updatePriceAndAmount()
    {
        $price_ev_float_value = floatval($this->price_ev);

        $vat_float_value = floatval($this->vat);

        $new_price = $this->calculatePriceFromPriceEVAndVAT($price_ev_float_value, $vat_float_value);

        $this->price = number_format($new_price, 3, '.', '');

        $this->updateAmount();
    }

    public function updatePriceEVAndAmount()
    {
        
        $price_float_value = floatval($this->price);

        $vat_float_value = floatval($this->vat);

        $new_price_ev = $this->calculatePriceEVFromPriceAndVAT($price_float_value, $vat_float_value);

        $this->price_ev = number_format($new_price_ev, 3, '.', '');

        $this->updateAmount();

    }

    public function deleteItem($item_num)
    {
        
        $new_total = floatval($this->total);

        foreach($this->items as $key=>$item)
        {
            if($item['num'] == $item_num)
            {
                $new_total = floatval($this->total) - $item['amount'];

                unset($this->items[$key]);
            }
        }

        $this->total = number_format($new_total,3,'.',''); 
    }
    

    public function submit()
    {
        
        $validatedData = $this->validate();

        $this->items[] = [
            'num' => $this->num++,
            'item_name' => $this->item_name, 
            'price' => $this->price, 
            'vat' => $this->vat, 
            'price_ev' => $this->price_ev, 
            'quantity' => $this->quantity, 
            'amount' => $this->amount,
        ];

        $new_total = floatval($this->total) + floatval($this->amount);

        $this->total = number_format($new_total,3,'.',''); 

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
