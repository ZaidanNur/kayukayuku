@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-3xl">
             {{-- Header --}}
             <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-[#E6CCB2]/50 pb-6">
                <div>
                    <h1 class="text-3xl font-serif font-bold text-[#4E030E] mb-1">Order Details</h1>
                    <p class="text-[#7F5539]">Order ID: <span class="font-mono font-bold">{{ $order->id }}</span></p>
                </div>
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-[#E6CCB2]/30">
                    <span class="text-sm text-[#7F5539]">Date:</span>
                    <span class="font-bold text-[#4E030E] ml-2">{{ date('d/m/Y', strtotime($order->order_date)) }}</span>
                </div>
            </div>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm relative overflow-hidden" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-[#E6CCB2]/50 overflow-hidden">
                {{-- Customer Info --}}
                <div class="p-6 md:p-8 bg-[#FDFBF7] border-b border-[#E6CCB2]/30">
                    <h3 class="text-lg font-serif font-bold text-[#4E030E] mb-4">Customer Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-[#7F5539]">
                        <div>
                            <p class="text-xs uppercase tracking-wider text-[#A67C52] mb-1">Name</p>
                            <p class="font-medium text-lg">{{ $order->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wider text-[#A67C52] mb-1">Phone</p>
                            <p class="font-medium text-lg">{{ $order->phone_number }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-xs uppercase tracking-wider text-[#A67C52] mb-1">Address</p>
                            <p class="font-medium text-lg leading-relaxed">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>

                {{-- Order Items --}}
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-serif font-bold text-[#4E030E] mb-4">Items Ordered</h3>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-[#E6CCB2]/20 mb-6">
                        <div>
                            <p class="text-lg font-bold text-[#4E030E]">{{ $order->product->product_name }}</p>
                            <p class="text-[#A67C52] font-semibold">@currency($order->product->product_price)</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-xs uppercase text-gray-500 mb-1">Quantity</span>
                            <span class="text-xl font-bold text-[#4E030E]">{{ $order->amount }}x</span>
                        </div>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between py-3 border-b border-dashed border-[#E6CCB2]">
                            <span class="text-[#7F5539]">Note</span>
                            <span class="font-medium text-right max-w-xs">{{ $order->note ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-dashed border-[#E6CCB2]">
                            <span class="text-[#7F5539]">Status</span>
                            <span class="font-bold text-[#4E030E] bg-yellow-100 px-3 py-1 rounded-full text-xs uppercase">{{ $order->status }}</span>
                        </div>
                        <div class="flex justify-between py-4 text-xl font-bold text-[#4E030E]">
                            <span>Total</span>
                            <span>@currency($order->product->product_price * $order->amount)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('orders.index') }}" class="text-[#A67C52] hover:text-[#4E030E] font-medium transition-colors inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to My Orders
                </a>
            </div>
        </div>
    </div>
@endsection
