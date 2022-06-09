<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\ChangeLog;

class ProductAmount extends Component
{
    public $item;
    public $product_name;
    public $jumlah;
    
    protected $listeners = ['changed' => '$refresh'];

    public function mount($item)
    {
        $this->jumlah = $item->jumlah != null ? $item->jumlah:0;
    }

    public function render(){
        return view('livewire.product-amount');
    }

    public function reduceStock($id)
    {
        $item = Cart::findOrFail($id);
        
        $newData = Cart::findOrFail($id)->toArray();
        $newData['jumlah'] = $newData['jumlah'] -1;

        $item -> update($newData);
        $this->jumlah =  $newData['jumlah'];
        $this->emitSelf('changed');
    }

    public function addStock($id)
    {
        $item = Cart::findOrFail($id);
        
        $newData = Cart::findOrFail($id)->toArray();
        $newData['jumlah'] = $newData['jumlah'] + 1;

        $item -> update($newData);
        $this->jumlah =  $newData['jumlah'];
        $this->emitSelf('changed');
    }

    public function destroy($id)
    {
        $item = Cart::findOrFail($id);
        $item -> delete();

        return redirect()->route('carts.index');
    }
}
