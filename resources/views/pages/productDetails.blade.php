@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-[#E6CCB2]/30">
                <div class="flex flex-col md:flex-row">
                    {{-- Image Section --}}
                    <div class="w-full md:w-1/2 p-4 md:p-8 bg-[#FDFBF7] flex items-center justify-center relative">
                        <div class="relative w-full aspect-square md:aspect-[4/3] rounded-xl overflow-hidden shadow-lg border-4 border-white">
                            @php $is_image = false; @endphp

                            @foreach ($galleries as $gallery)
                                @if ($gallery->product_id == $item->id)
                                    <img src="{{ Storage::url($gallery->image) }}" class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-500" alt="{{ $item->product_name }}">
                                    @php $is_image = true; @endphp
                                @endif
                            @endforeach

                            @if (!$is_image)
                                <img src="{{ url("images/img-not-found.jpg") }}" class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Not found">
                            @endif
                        </div>
                    </div>

                    {{-- Product Details Section --}}
                    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col">
                        <div class="mb-auto">
                            <span class="inline-block px-3 py-1 bg-[#FDFBF7] text-[#A67C52] text-xs font-bold uppercase tracking-wider rounded-md border border-[#E6CCB2] mb-4">
                                Premium Collection
                            </span>
                            <h1 class="text-3xl md:text-5xl font-serif font-bold text-[#4E030E] mb-4 leading-tight">
                                {{ $item->product_name }}
                            </h1>
                            <div class="flex items-center gap-4 mb-8">
                                <span class="text-2xl md:text-3xl font-bold text-[#A67C52]">
                                    @currency($item->product_price)
                                </span>
                                @if($item->product_stock > 0)
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">
                                        Available: {{ $item->product_stock }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>

                            <div class="prose prose-stone max-w-none text-[#7F5539] mb-8 leading-relaxed">
                                <h3 class="text-[#4E030E] font-serif font-bold text-lg mb-2">Description</h3>
                                <p>{{ $item->product_description }}</p>
                            </div>
                        </div>

                        {{-- Action Section --}}
                        <div class="pt-8 border-t border-[#E6CCB2]/30 mt-8">
                             <form action="{{ route("carts.store") }}" method="post" class="flex flex-col gap-4">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="jumlah">

                                <button type="submit" 
                                    class="w-full py-4 bg-[#4E030E] text-white font-bold tracking-widest rounded-full shadow-lg hover:bg-[#3D020B] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    ADD TO CART
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('barang') }}" class="text-[#A67C52] hover:text-[#4E030E] font-medium transition-colors flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Catalog
                </a>
            </div>
        </div>
    </div>
@endsection
