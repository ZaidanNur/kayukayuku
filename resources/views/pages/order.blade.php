@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            {{-- Header --}}
            <div class="mb-10 border-b border-[#E6CCB2]/50 pb-4">
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-[#4E030E] mb-2">My Orders</h1>
                <p class="text-[#7F5539]">Track your past and current purchases</p>
            </div>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm relative overflow-hidden" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(count($orders) > 0)
                <div class="space-y-6">
                    @foreach ($orders as $order)
                        <div class="bg-white rounded-xl shadow-sm border border-[#E6CCB2]/50 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row gap-6">
                                    {{-- Product Image --}}
                                    <div class="w-full md:w-32 h-32 flex-shrink-0 bg-[#FDFBF7] rounded-lg overflow-hidden relative">
                                        @php $isImage = false; @endphp
                                        @foreach ($images as $image)
                                            @if ($image->product_id == $order->product_id)
                                                <img src="{{ Storage::url($image->image) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $order->product->product_name }}">
                                                @php $isImage = true; @endphp
                                                @break
                                            @endif
                                        @endforeach

                                        @if (!$isImage)
                                            <img src="{{ url("images/img-not-found.jpg") }}" class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Not found">
                                        @endif
                                    </div>

                                    {{-- Order Details --}}
                                    <div class="flex-grow flex flex-col justify-between">
                                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                                            <div>
                                                <h2 class="text-xl font-serif font-bold text-[#4E030E] mb-1">
                                                    {{ $order->product->product_name }}
                                                </h2>
                                                @if($order->status =='Dibatalkan Oleh Customer')
                                                    <span class="inline-block px-2 py-0.5 bg-red-100 text-red-700 text-xs font-bold rounded uppercase tracking-wide">Cancelled</span>
                                                @endif
                                            </div>
                                            <div class="text-[#A67C52] font-bold text-lg mt-2 md:mt-0">
                                                @currency($order->product->product_price)
                                            </div>
                                        </div>

                                        <div class="flex flex-col md:flex-row justify-between items-end gap-4">
                                            <div class="text-sm text-[#7F5539] space-y-1">
                                                <p><span class="font-medium">Amount:</span> {{ $order->amount }} items</p>
                                                <p><span class="font-medium">Total:</span> @currency($order->product->product_price * $order->amount)</p>
                                                <p class="mt-2">
                                                    <span class="font-medium">Status:</span> 
                                                    <span class="text-[#4E030E] font-bold">{{ $order->status }}</span>
                                                </p>
                                            </div>

                                            <div class="flex gap-3">
                                                <a href="{{ route('orders.show', $order) }}" 
                                                    class="px-4 py-2 border border-[#4E030E] text-[#4E030E] text-sm font-medium rounded-full hover:bg-[#4E030E] hover:text-white transition-colors duration-300">
                                                    View Details
                                                </a>
                                                {{-- Uncomment/Adapt if cancellation is needed
                                                @if ($order->status == 'Menunggu Pembayaran')
                                                    <button id="btnCancelOrder" data-order="{{ $order->id }}" onclick="openCancelModal({{ $order->id }})"
                                                        class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-full hover:bg-red-700 transition-colors duration-300">
                                                        Cancel
                                                    </button>
                                                @endif
                                                --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-[#E6CCB2]/30">
                    <svg class="w-16 h-16 text-[#E6CCB2] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <h3 class="text-xl font-serif font-bold text-[#4E030E] mb-2">No orders yet</h3>
                    <p class="text-[#7F5539] mb-6">Looks like you haven't made any purchases.</p>
                    <a href="{{ route('barang') }}" class="inline-block px-6 py-2 bg-[#4E030E] text-white font-medium rounded-full shadow hover:bg-[#3D020B] transition-colors">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        // Modal functionality for cancel can be adapted here if using Tailwind modals
        // Currently keeping placeholder logic compatible with existing modals if strictly needed, 
        // but ideally should use toggleModal from layout
    </script>
@endpush
