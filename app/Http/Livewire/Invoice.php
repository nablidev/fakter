<?php

namespace App\Http\Livewire;

use PDF;
use Carbon\Carbon;
use Livewire\Component;

class Invoice extends Component
{
    public $document_type = 'invoice';
    public $document_no = 0;
    public $document_date;

    public $from_name = '';
    public $from_address = '';
    public $from_fiscal_code = '';

    public $to_name = '';
    public $to_address = '';
    public $to_fiscal_code = '';

    public $num = 4;

    public $item_name = '';
    public $price = '0.000';
    public $vat = '19';
    public $price_ev = '0.000';
    public $quantity = '1';
    public $amount_ev = '0.000';
    public $amount = '0.000';

    public $revenue_stamp = '1.000';
    public $discount = '0.000';

    public $items_total_ev = '2352.941';
    public $total_vat = '19.00';
    public $items_total = '2800.000';

    public $total = '2801.000';

    protected $rules = [
        'document_no' => 'required|numeric|between:0,1000000000',

        'from_name' => 'max:128',
        'from_address' => 'max:128',
        'from_fiscal_code' => 'max:128',

        'to_name' => 'max:128',
        'to_address' => 'max:128',
        'to_fiscal_code' => 'max:128',

        'item_name' => 'required|max:256',
        'price' => 'required|numeric|gte:0|lte:1000000000',
        'vat' => 'required|numeric|between:0,100',
        'price_ev' => 'required|numeric|gte:0|lte:1000000000',
        'quantity' => 'required|numeric|gte:0|lte:1000000000',

        'revenue_stamp' => 'required|numeric|gte:0|lte:1000000000',
        'discount' => 'required|numeric|gte:0|lte:1000000000',
    ];


    public $items = [
        [   
            'num' => 1,
            'item_name' => 'Apple MacBook Pro 17', 
            'price' => '1500', 
            'vat' => '19', 
            'price_ev' => '1260.504', 
            'quantity' => '1',
            'amount_ev' => '1260.504', 
            'amount' => '1500'
        ],
        [   
            'num' => 2,
            'item_name' => 'Samsung Galaxy', 
            'price' => '700', 
            'vat' => '19', 
            'price_ev' => '588.235', 
            'quantity' => '1', 
            'amount_ev' => '588.235',
            'amount' => '700'
        ],
        [   
            'num' => 3,
            'item_name' => 'Xiomi Redmi 7', 
            'price' => '600', 
            'vat' => '19', 
            'price_ev' => '504.202', 
            'quantity' => '1', 
            'amount_ev' => '504.202',
            'amount' => '600'
        ],
    ];

    

    public function updateAmount()
    {
        $new_amount_ev = floatval($this->price_ev) * floatval($this->quantity);

        $new_amount = floatval($this->price) * floatval($this->quantity);

        $this->amount_ev = number_format($new_amount_ev, 3, '.', '');

        $this->amount = number_format($new_amount, 3, '.', '');
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
        $new_items_total_ev = floatval($this->items_total_ev);
        
        $new_items_total = floatval($this->items_total);

        $new_total_vat = floatval($this->total_vat);

        foreach($this->items as $key=>$item)
        {
            if($item['num'] == $item_num)
            {
                $new_items_total_ev = floatval($this->items_total_ev) - $item['amount_ev'];

                $new_items_total = floatval($this->items_total) - $item['amount'];

                $new_total_vat = $this->calculateVATFromPriceAndPriceEV($new_items_total, $new_items_total_ev);

                unset($this->items[$key]);
            }
        }

        $this->items_total_ev = number_format($new_items_total_ev, 3, '.', ''); 

        $this->items_total = number_format($new_items_total, 3, '.', ''); 

        $this->total_vat = number_format($new_total_vat, 2, '.', '');

        #update total

        $this->updateTotal();
    }
    
    public function updateTotal()
    {
        $items_total_float_val = floatval($this->items_total);

        $revenue_stamp_float_val = floatval($this->revenue_stamp);
        $discount_float_val = floatval($this->discount);

        $new_total = $this->calculateTotal($items_total_float_val, $revenue_stamp_float_val, $discount_float_val);
        
        $this->total = number_format($new_total,3,'.','');
    }

    public function generatePDF()
    {
        //dd("your invoice generated pdf");
        //return redirect()->to('/generate-pdf');

        
        $viewData = [
            'title' => 'MY INVOICE',
            'date' => date('m/d/Y'),
            'items' => $this->items,
        ];
          
        $pdfContent = PDF::loadView('myPDF', $viewData)->output();

        return response()->streamDownload(fn () => print($pdfContent),"filename.pdf");

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
            'amount_ev' => $this->amount_ev,
            'amount' => $this->amount,
        ];



        $new_items_total_ev = floatval($this->items_total_ev) + floatval($this->amount_ev);

        $new_items_total = floatval($this->items_total) + floatval($this->amount);

        $new_total_vat = $this->calculateVATFromPriceAndPriceEV($new_items_total, $new_items_total_ev);

        $this->items_total_ev = number_format($new_items_total_ev, 3, '.', ''); 

        $this->items_total = number_format($new_items_total, 3, '.', '');
        
        $this->total_vat = number_format($new_total_vat, 2, '.', '');

        #update total

        $this->updateTotal();

        #initialize amount back to 0

        #maybe initialize other variables
        
    }

    public function updated()
    {
        #validate all field on every update
        $this->validate();
    }

    public function mount()
    {
        $this->document_no = mt_rand(0, 1000000000);
        
        #because values passed and received from html are in the format 'Y-m-d'
        $this->document_date = Carbon::now()->format('Y-m-d');
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

    private function calculateVATFromPriceAndPriceEV($price, $price_ev)
    {
        if($price == 0 or $price_ev == 0)
        {
            return 0;
        }

        $vat = ($price - $price_ev) * 100 / $price_ev;

        return $vat;
    }
    
    private function calculateTotal($items_total, $revenue_stamp, $discount)
    {
        return $items_total + $revenue_stamp - $discount;
    }
}
