<div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4 w-full">
    {{-- Quantity Controls --}}
    <div class="flex items-center bg-[#FDFBF7] rounded-lg border border-[#E6CCB2] p-1">
        <button type="button" wire:click="reduceStock({{ $item->id }})"
            class="w-8 h-8 flex items-center !bg-[#FDFBF7] justify-center text-[#7F5539] !hover:bg-[#E6CCB2] hover:cursor-pointer rounded transition-colors"
            aria-label="Decrease quantity">
            <i class="fa-solid fa-minus text-sm"></i>
        </button>

        <input type="number" wire:model="jumlah"
            class="w-12 text-center border-none p-0 !text-[#4E030E] font-bold focus:ring-0 appearance-none bg-transparent"
            readonly>

        <button type="button" wire:click="addStock({{ $item->id }})"
            class="w-8 h-8 flex items-center !bg-[#FDFBF7] justify-center text-[#7F5539] !hover:bg-[#E6CCB2] hover:cursor-pointer rounded transition-colors"
            aria-label="Increase quantity">
            <i class="fa-solid fa-plus text-sm"></i>
        </button>
    </div>

    {{-- Validation Error --}}
    @error('jumlah') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

    {{-- Action Buttons --}}
    <div class="flex items-center gap-3 ml-auto">
        <button type="button" wire:click="destroy({{ $item->id }})" class="text-red-400 hover:text-red-600 p-2 transition-colors"
            title="Remove Item">
            <i class="fa-solid fa-trash-can"></i>
        </button>

        <button type="button"
            onclick="openCheckoutModal('{{ $item->product_id }}', '{{ $product_name }}', '{{ $item->id }}', '{{ $jumlah }}')"
            class="px-6 py-2 bg-[#A67C52] text-white font-bold rounded-lg shadow hover:bg-[#8B6544] disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm uppercase tracking-wide"
            {{ $jumlah > 0 ? '' : 'disabled' }}>
            Checkout
        </button>
    </div>
</div>