<div class="d-flex" >
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <button 
    wire:click="reduceStock({{ $item->id }})"
    class="btn btn-danger" style="width: 25px; height: 25px; padding: 0; margin-inline: 10px"><i class="fa-solid fa-minus fa-1x"></i></button>

    <p class="product-stock" data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to batch action">{{ $item->product_stock }}</p>

    <button
    wire:click="addStock({{ $item->id }})"
    class="btn btn-primary" style="width: 25px; height: 25px; padding: 0; margin-inline: 10px"><i class="fa-solid fa-plus fa-1x"></i></button>
</div>

