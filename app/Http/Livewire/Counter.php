<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $value;

    public function submit()
    {
        dd($this->value);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
