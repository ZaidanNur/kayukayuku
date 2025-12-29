@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-3xl font-serif font-bold text-[#4E030E] mb-8 text-center">Payment Confirmation</h1>

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm relative overflow-hidden">
                    <ul class="list-disc ml-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-[#E6CCB2]/30 flex flex-col md:flex-row">
                {{-- Product Summary --}}
                <div class="w-full md:w-1/3 bg-[#FDFBF7] p-6 border-r border-[#E6CCB2]/30 flex flex-col items-center text-center">
                    <div class="w-48 h-48 bg-white rounded-lg shadow-sm overflow-hidden mb-6 relative border border-[#E6CCB2]/20">
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
                    
                    <h3 class="text-xl font-serif font-bold text-[#4E030E] mb-2">{{ $order->product->product_name }}</h3>
                    <p class="text-[#A67C52] font-bold text-lg mb-4">@currency($order->product->product_price)</p>
                    
                    <div class="w-full pt-4 border-t border-[#E6CCB2]/20">
                         <div class="flex justify-between text-sm mb-2">
                            <span class="text-[#7F5539]">Quantity</span>
                            <span class="font-bold text-[#4E030E]">{{ $order->amount }}x</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold">
                            <span class="text-[#4E030E]">Total</span>
                            <span class="text-[#4E030E]">@currency($order->product->product_price * $order->amount)</span>
                        </div>
                    </div>
                </div>

                {{-- Payment Form --}}
                <div class="w-full md:w-2/3 p-8">
                    <div class="mb-8 p-4 bg-yellow-50 rounded-lg border border-yellow-100">
                        <h4 class="font-serif font-bold text-[#4E030E] mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#A67C52]" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                            </svg>
                            Transfer Instructions
                        </h4>
                        <ul class="space-y-2 text-sm text-[#7F5539]">
                            <li class="flex justify-between border-b border-yellow-100 pb-1">
                                <span>Bank BRI</span>
                                <span class="font-mono font-bold select-all">2934890183477</span>
                                <span class="text-xs text-gray-400">(A.n Syaiful)</span>
                            </li>
                            <li class="flex justify-between pt-1">
                                <span>DANA</span>
                                <span class="font-mono font-bold select-all">08182839849</span>
                                <span class="text-xs text-gray-400">(A.n Syaiful)</span>
                            </li>
                        </ul>
                    </div>

                    <form action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-[#7F5539] mb-2">Upload Payment Proof</label>
                            <input type="file" id="image" name="payment_proof" required
                                class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-[#FDFBF7] file:text-[#4E030E]
                                hover:file:bg-[#E6CCB2]
                                transition-all cursor-pointer border border-[#E6CCB2] rounded-lg p-2
                            "/>
                            <p class="text-xs text-gray-400 mt-1">Allowed formats: JPG, PNG, PDF. Max size: 2MB.</p>
                        </div>

                        <button type="submit" 
                            class="w-full py-3 bg-[#4E030E] text-white font-bold tracking-wide rounded-full shadow-lg hover:bg-[#3D020B] transition-all hover:-translate-y-1">
                            Confirm Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
