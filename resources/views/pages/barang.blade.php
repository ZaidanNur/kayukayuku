@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4">
            {{-- Alert Messages --}}
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-sm relative overflow-hidden" role="alert">
                    <p class="font-bold">Please check your inputs:</p>
                    <ul class="list-disc ml-5 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm relative overflow-hidden" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @guest
                {{-- Guest View - Redirect or Show Teaser (Usually handled by middleware, but if accessible) --}}
                <div class="text-center py-20">
                     <h2 class="text-3xl font-serif font-bold text-[#4E030E] mb-4">Please Login</h2>
                     <p class="text-[#7F5539] mb-8">You need to be logged in to view our full catalog.</p>
                     <button onclick="toggleModal('login-modal')" class="px-8 py-3 bg-[#4E030E] text-white font-medium rounded-full shadow-lg hover:shadow-xl hover:bg-[#3D020B] transition-all duration-300">
                        Login Now
                    </button>
                </div>
            @else
                {{-- Header --}}
                <div class="mb-12 text-center md:text-left border-b border-[#E6CCB2]/50 pb-6">
                    <h1 class="text-3xl md:text-5xl font-serif font-bold text-[#4E030E] mb-2">Product Catalog</h1>
                    <p class="text-[#7F5539] text-lg font-light tracking-wide">Explore our premium handcrafted wooden collection</p>
                </div>

                {{-- Product Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @foreach ($items as $item)
                        <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#E6CCB2]/30 flex flex-col h-full">
                            {{-- Image Container --}}
                            <div class="relative w-full pt-[100%] bg-[#FDFBF7] overflow-hidden">
                                @php $image_found = false; @endphp

                                @foreach ($galleries as $gallery)
                                    @if ($gallery->product_id == $item->id && !$image_found)
                                        <img src="{{ Storage::url($gallery->image) }}"
                                            class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                                            alt="{{ $item->product_name }}">
                                        @php $image_found = true; @endphp
                                    @endif
                                @endforeach

                                @if (!$image_found)
                                    <img src="{{ url("images/img-not-found.jpg") }}"
                                        class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 opacity-80 mix-blend-multiply"
                                        alt="Image not found">
                                @endif

                                {{-- Overlay Link --}}
                                <a href="{{ route('product-details', $item->id) }}" class="absolute inset-0 z-10"></a>
                            </div>

                            {{-- Product Info --}}
                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-serif font-bold text-[#4E030E] mb-1 group-hover:text-[#A67C52] transition-colors leading-snug">
                                        <a href="{{ route('product-details', $item->id) }}">{{ $item->product_name }}</a>
                                    </h3>
                                    <p class="text-[#A67C52] font-bold text-lg mb-3">@currency($item->product_price)</p>
                                </div>

                                {{-- Add to Cart Form --}}
                                <div class="mt-4 pt-4 border-t border-[#E6CCB2]/20 relative z-20">
                                    <form action="{{ route("carts.store") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <input type="hidden" name="jumlah">

                                        @php
                                            $in_cart = false;
                                            foreach ($cart as $cart_item) {
                                                if ($cart_item->product_id == $item->id) {
                                                    $in_cart = true;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        <button type="submit" 
                                            class="w-full py-2.5 px-4 rounded-full font-medium text-sm transition-all duration-300 flex items-center justify-center gap-2
                                            {{ $in_cart 
                                                ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                                                : 'bg-[#4E030E] text-white hover:bg-[#3D020B] shadow-md hover:shadow-lg transform hover:-translate-y-0.5' 
                                            }}" 
                                            {{ $in_cart ? 'disabled' : '' }}>
                                            @if ($in_cart)
                                                <span>In Cart</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                <span>Add to Cart</span>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endguest
        </div>
    </div>
@endsection
