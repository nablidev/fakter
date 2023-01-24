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

    
    public $revenue_stamp = '1.000';
    public $discount = '0.000';

    public $items_total_ev = '2352.941';
    public $total_vat = '447.059';
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

        'revenue_stamp' => 'required|numeric|gte:0|lte:1000000000',
        'discount' => 'required|numeric|gte:0|lte:1000000000',
    ];

    protected $listeners = ['itemAdded' => 'addItem'];

    public $items = [
        [   
            'num' => 1,
            'item_name' => 'Apple MacBook Pro 17', 
            'price' => '1500', 
            'item_vat_percent' => '19', 
            'price_ev' => '1260.504', 
            'quantity' => '1',
            'amount_ev' => '1260.504', 
            'amount' => '1500'
        ],
        [   
            'num' => 2,
            'item_name' => 'Samsung Galaxy', 
            'price' => '700', 
            'item_vat_percent' => '19', 
            'price_ev' => '588.235', 
            'quantity' => '1', 
            'amount_ev' => '588.235',
            'amount' => '700'
        ],
        [   
            'num' => 3,
            'item_name' => 'Xiomi Redmi 7', 
            'price' => '600', 
            'item_vat_percent' => '19', 
            'price_ev' => '504.202', 
            'quantity' => '1', 
            'amount_ev' => '504.202',
            'amount' => '600'
        ],
    ];


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

        $this->total_vat = number_format($new_total_vat, 3, '.', '');

        #update total

        $this->updateTotal();
    }
    
    public function updateTotal()
    {
        $items_total_float_val = floatval($this->items_total);

        $revenue_stamp_float_val = floatval($this->revenue_stamp);
        $discount_float_val = floatval($this->discount);

        $new_total = $this->calculateTotal($items_total_float_val, $revenue_stamp_float_val, $discount_float_val);
        
        $this->total = number_format($new_total, 3, '.', '');
    }

    public function generatePDF()
    {
        
        $this->validate();

        $viewData = [
            'document_type' => $this->document_type,
            'document_no' => $this->document_no,
            'document_date' => Carbon::parse($this->document_date)->format('d/m/Y'),
            'from_name' => $this->from_name,
            'from_address' => $this->from_address,
            'from_fiscal_code' => $this->from_fiscal_code,
            'to_name' => $this->to_name,
            'to_address' => $this->to_address,
            'to_fiscal_code' => $this->to_fiscal_code,
            'items' => $this->items,
        ];
          
        $pdfContent = PDF::loadView('myPDF', $viewData)->output();

        return response()->streamDownload(fn () => print($pdfContent), "filename.pdf");

    }



    public function addItem($item_to_add)
    {
        
        $this->items[] = $item_to_add;



        $new_items_total_ev = floatval($this->items_total_ev) + floatval($item_to_add['amount_ev']);

        $new_items_total = floatval($this->items_total) + floatval($item_to_add['amount']);

        $new_total_vat = $this->calculateVATFromPriceAndPriceEV($new_items_total, $new_items_total_ev);

        $this->items_total_ev = number_format($new_items_total_ev, 3, '.', ''); 

        $this->items_total = number_format($new_items_total, 3, '.', '');
        
        $this->total_vat = number_format($new_total_vat, 3, '.', '');

        #update total

        $this->updateTotal();
        
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


    private function calculateVATFromPriceAndPriceEV($price, $price_ev)
    {
        return $price - $price_ev;
    }

    private function calculateVATPercentageFromPriceAndPriceEV($price, $price_ev)
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
