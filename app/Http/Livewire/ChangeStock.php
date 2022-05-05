<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeStock extends Component
{
    public $item;
    
    public function render()
    {
        return view('livewire.change-stock');
    }
}
