<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ChangeLog;
use Illuminate\Http\Client\Request;

class ChangeStock extends Component
{
    public $item;
    
    protected $listeners = ['changed' => '$refresh'];

    public function render()
    {
        return view('livewire.change-stock');
    }

    public function reduceStock($id)
    {
        $item = Product::findOrFail($id);
        
        $newData = Product::findOrFail($id)->toArray();
        $newData['product_stock'] = $newData['product_stock'] -1;

        $log = [
            'product_id'=>$id,
            'stock_added'=>null,
            'stock_reduced'=> -1,
        ];

        
        ChangeLog::create($log);

        $item -> update($newData);
        $this->emitSelf('changed');
    }

    public function addStock($id)
    {
        $item = Product::findOrFail($id);
        
        $newData = Product::findOrFail($id)->toArray();
        $newData['product_stock'] = $newData['product_stock'] + 1;

        $log = [
            'product_id'=>$id,
            'stock_added'=> 1,
            'stock_reduced'=> null,
        ];

        
        ChangeLog::create($log);

        $item -> update($newData);
        $this->emitSelf('changed');
    }

    public function change_stock_batch($id)
    {

        $item = Product::findOrFail($id);
        
        $newData = Product::findOrFail($id)->toArray();
        $newData['product_stock'] = $newData['product_stock'] + $this->stockChange;

        $log = [
            'product_id'=>$id,
            'stock_added'=> $this->stockChange,
            'stock_reduced'=> null,
        ];

        
        ChangeLog::create($log);

        $item -> update($newData);
        $this->emitSelf('changed');
    }
}
