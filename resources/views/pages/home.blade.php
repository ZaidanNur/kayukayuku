@extends('layouts.tailwind')

@section('content')
    {{-- Hero Section --}}
    <header class="relative w-full h-[85vh] flex items-center justify-center overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0 z-0">
            <div
                class="absolute inset-0 bg-[#4E030E]/30 mix-blend-multiply transition-opacity duration-700 hover:bg-[#4E030E]/20">
            </div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 text-center px-6 md:px-12 max-w-4xl mx-auto" data-aos="fade-up">
            <h1
                class="text-4xl md:text-6xl lg:text-7xl font-serif font-bold text-white mb-6 drop-shadow-xl tracking-tight leading-tight">
                Premium Handicraft
            </h1>
            <p
                class="text-lg md:text-2xl lg:text-3xl text-[#FDFBF7] font-light tracking-wide mb-8 font-sans drop-shadow-md">
                100% Original & Foodgrade
            </p>
            <a href="#products"
                class="inline-block px-8 py-3 md:px-10 md:py-4 bg-[#FDFBF7] text-[#4E030E] font-medium text-sm md:text-base tracking-[0.2em] rounded-sm hover:bg-[#4E030E] hover:text-[#FDFBF7] transition-all duration-300 uppercase shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Explore Collection
            </a>
        </div>
    </header>

    {{-- Stats Section --}}
    <section class="py-12 md:py-20 bg-[#FDFBF7] border-b border-[#E6CCB2]/50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center divide-x divide-[#E6CCB2]/50">
                <div class="p-2 md:p-4 group cursor-default">
                    <h2
                        class="text-3xl md:text-4xl font-serif font-bold text-[#A67C52] mb-1 md:mb-2 group-hover:scale-110 transition-transform duration-300">
                        6000+</h2>
                    <p class="text-[#7F5539] font-medium tracking-wide uppercase text-xs md:text-sm">Sold / Month</p>
                </div>
                <div class="p-2 md:p-4 group cursor-default">
                    <h2
                        class="text-3xl md:text-4xl font-serif font-bold text-[#A67C52] mb-1 md:mb-2 group-hover:scale-110 transition-transform duration-300">
                        30</h2>
                    <p class="text-[#7F5539] font-medium tracking-wide uppercase text-xs md:text-sm">Cities</p>
                </div>
                <div class="p-2 md:p-4 group cursor-default">
                    <h2
                        class="text-3xl md:text-4xl font-serif font-bold text-[#A67C52] mb-1 md:mb-2 group-hover:scale-110 transition-transform duration-300">
                        4</h2>
                    <p class="text-[#7F5539] font-medium tracking-wide uppercase text-xs md:text-sm">Countries</p>
                </div>
                <div class="p-2 md:p-4 group cursor-default">
                    <h2
                        class="text-3xl md:text-4xl font-serif font-bold text-[#A67C52] mb-1 md:mb-2 group-hover:scale-110 transition-transform duration-300">
                        15</h2>
                    <p class="text-[#7F5539] font-medium tracking-wide uppercase text-xs md:text-sm">Resellers</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Alert Messages --}}
    <div class="container mx-auto px-4 mt-8">
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm relative overflow-hidden"
                role="alert">
                <p class="font-bold">Please check your inputs:</p>
                <ul class="list-disc ml-5 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm relative overflow-hidden"
                role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>

    {{-- Products Section --}}
    @guest
        {{-- Show Teaser for Guests --}}
        <section id="products" class="py-16 md:py-24 bg-white relative">
            <div class="absolute top-0 inset-x-0 h-40 bg-gradient-to-b from-[#FDFBF7] to-transparent pointer-events-none"></div>

            <div class="container mx-auto px-4">
                <div class="text-center mb-12 md:mb-16">
                    <span class="text-[#A67C52] font-bold tracking-widest uppercase text-xs md:text-sm block mb-3">Login to
                        View</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-[#4E030E]">Exclusive Collection</h2>
                    <div class="w-16 md:w-24 h-1 bg-[#E6CCB2] mx-auto mt-6 rounded-full"></div>
                </div>

                <div
                    class="flex flex-col items-center justify-center py-12 bg-[#FDFBF7] rounded-2xl border border-[#E6CCB2]/30 shadow-inner max-w-2xl mx-auto text-center px-6">
                    <p class="text-[#7F5539] text-lg mb-6 max-w-md mx-auto">
                        Please login or register to view our full catalog of premium handcrafted wooden products.
                    </p>
                    <div class="flex gap-4">
                        <button onclick="toggleModal('login-modal')"
                            class="px-8 py-3 bg-[#4E030E] text-white font-medium rounded-full shadow-lg hover:shadow-xl hover:bg-[#3D020B] transition-all duration-300">
                            Login Now
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="products" class="py-16 md:py-24 bg-white relative">
            <div class="absolute top-0 inset-x-0 h-40 bg-gradient-to-b from-[#FDFBF7] to-transparent pointer-events-none"></div>

            <div class="container mx-auto px-4">
                <div class="text-center mb-12 md:mb-16">
                    <span class="text-[#A67C52] font-bold tracking-widest uppercase text-xs md:text-sm block mb-3">Our
                        Collection</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-[#4E030E]">Best Selling Products</h2>
                    <div class="w-16 md:w-24 h-1 bg-[#E6CCB2] mx-auto mt-6 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8 lg:gap-10">
                    @foreach ($items as $item)
                        <div
                            class="group relative bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#E6CCB2]/30 flex flex-col h-full">
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

                                {{-- Overlay Actions --}}
                                <div
                                    class="absolute inset-0 bg-[#4E030E]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                                    <a href="{{ route('product-details', $item->id) }}"
                                        class="px-6 py-2 bg-white text-[#4E030E] font-bold rounded-full shadow-lg hover:bg-[#4E030E] hover:text-white transition-all duration-300 transform translate-y-4 group-hover:translate-y-0 text-sm tracking-wide">
                                        View Details
                                    </a>
                                </div>
                            </div>

                            {{-- Product Info --}}
                            <div class="p-5 md:p-6 text-center flex-grow flex flex-col justify-between">
                                <div>
                                    <h3
                                        class="text-lg md:text-xl font-serif font-bold text-[#4E030E] mb-2 group-hover:text-[#A67C52] transition-colors leading-snug">
                                        {{ $item->product_name }}
                                    </h3>
                                    <p class="text-[#7F5539] text-xs md:text-sm line-clamp-2 leading-relaxed opacity-80 mb-4">
                                        {{ $item->product_description }}
                                    </p>
                                </div>
                                <div class="mt-auto pt-4 border-t border-[#E6CCB2]/20">
                                    <span
                                        class="inline-block px-3 py-1 bg-[#FDFBF7] text-[#A67C52] text-xs font-bold uppercase tracking-wider rounded-md">
                                        Premium Wood
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endguest
@endsection