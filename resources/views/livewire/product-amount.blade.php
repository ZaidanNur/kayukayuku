<div class="div">
    <div class="d-flex align-items-center" >
        {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        <button 
        wire:click="reduceStock({{ $item->id }})"
        class="btn btn-danger" style="width: 25px; height: 25px; padding: 0; margin-inline: 10px"><i class="fa-solid fa-minus fa-1x"></i></button>
    
        <input class="form-control" style="max-width: 150px" type="number" wire:model="jumlah" required>
        @error('jumlah') <span class="error">{{ $message }}</span> @enderror
     
    
        <button
        wire:click="addStock({{ $item->id }})"
        class="btn btn-primary" style="width: 25px; height: 25px; padding: 0; margin-inline: 10px"><i class="fa-solid fa-plus fa-1x"></i></button>
    
        <button 
        wire:click="destroy({{ $item->id }})"
        class="btn btn-danger" style="width: 25px; height: 25px; padding: 0; margin-inline: 10px"><i class="fa-solid fa-trash-can"></i></button>
    </div>
    <button id="btnPesan"
    class="btn btn-primary mt-3" style="width: 150px; margin-left: 45px" data-bs-toggle="modal" data-product="{{  $item->product_id }}" data-amount="{{ $jumlah }}" data-productname ="{{ $product_name }}" data-cart="{{ $item->id }}" data-bs-target="#orderModal" {{ $jumlah>0?'':'disabled' }}>Checkout</button>
    
</div>
