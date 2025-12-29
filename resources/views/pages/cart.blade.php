@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-5xl">
            {{-- Header --}}
            <div class="mb-10 text-center md:text-left border-b border-[#E6CCB2]/50 pb-6">
                <h1 class="text-3xl md:text-5xl font-serif font-bold text-[#4E030E] mb-2">Shopping Cart</h1>
                <p class="text-[#7F5539] text-lg font-light tracking-wide">Review your items before checkout</p>
            </div>

            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm">
                    <ul class="list-disc ml-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($cart_items != null && count($cart_items) > 0)
                <div class="space-y-6">
                    @foreach ($cart_items as $item)
                        <div
                            class="bg-white rounded-xl shadow-sm border border-[#E6CCB2]/50 overflow-hidden flex flex-col md:flex-row hover:shadow-md transition-shadow duration-300">
                            {{-- Image Section --}}
                            <div class="w-full md:w-1/4 h-48 md:h-auto overflow-hidden relative bg-[#FDFBF7]">
                                @php $isImage = false; @endphp
                                @foreach ($galleries as $gallery)
                                    @if ($gallery->product_id == $item->product_id)
                                        <img src="{{ Storage::url($gallery->image) }}" class="absolute inset-0 w-full h-full object-cover"
                                            alt="{{ $item->product->product_name }}">
                                        @php $isImage = true; @endphp
                                        @break
                                    @endif
                                @endforeach

                                @if (!$isImage)
                                    <img src="{{ url("images/img-not-found.jpg") }}"
                                        class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Not found">
                                @endif
                            </div>

                            {{-- Details Section --}}
                            <div class="p-6 md:p-8 flex-grow flex flex-col justify-between">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-xl font-serif font-bold text-[#4E030E] mb-1">
                                            {{ $item->product->product_name }}
                                        </h4>
                                        <p class="text-[#A67C52] font-bold text-lg">
                                            @currency($item->product->product_price)
                                        </p>
                                    </div>
                                </div>

                                {{-- Livewire Component --}}
                                <div class="mt-auto w-full">
                                    {{-- Passing attributes to the component --}}
                                    @livewire('product-amount', ['item' => $item, 'product_name' => $item->product->product_name], key($item->id))
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-[#E6CCB2]/30">
                    <svg class="w-20 h-20 text-[#E6CCB2] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="text-2xl font-serif font-bold text-[#4E030E] mb-2">Your cart is empty</h2>
                    <p class="text-[#7F5539] mb-8">Looks like you haven't added any items yet.</p>
                    <a href="{{ url('/') }}#products"
                        class="inline-block px-8 py-3 bg-[#4E030E] text-white font-bold rounded-full shadow hover:bg-[#3D020B] transition-colors">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Include Checkout Modal --}}
    @include('includes.checkout-modal')
@endsection

@push('after-script')
    <script>
        // Define toggleModal globally if not present
        if (typeof toggleModal === 'undefined') {
            window.toggleModal = function(modalID) {
                const modal = document.getElementById(modalID);
                if (modal) {
                    modal.classList.toggle('hidden');
                    // Add flex class when showing if it's not present (fix for some layouts)
                    if (!modal.classList.contains('hidden')) {
                        modal.classList.add('flex');
                    } else {
                        modal.classList.remove('flex');
                    }
                }
            }
        }

        // Function called by the Livewire component button
        function openCheckoutModal(productId, productName, cartId, amount) {
            // Update modal fields
            const prodIdField = document.getElementById('modal-product-id');
            const prodNameField = document.getElementById('modal-product-name');
            const cartIdField = document.getElementById('modal-cart-id');
            const amountField = document.getElementById('modal-amount');

            if(prodIdField) prodIdField.value = productId;
            if(prodNameField) prodNameField.value = productName;
            if(cartIdField) cartIdField.value = cartId;
            if(amountField) amountField.value = amount;

            // Show modal
            toggleModal('checkout-modal');
        }
    </script>
@endpush
