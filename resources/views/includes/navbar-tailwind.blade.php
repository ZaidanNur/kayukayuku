<nav class="bg-[#FDFBF7] sticky top-0 z-50 border-b border-[#E6CCB2] shadow-sm transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    {{-- Assuming logo matches original path --}}
                    <img src="{{ url('images/logo 1.png') }}" alt="KayuKayuku Logo"
                        class="h-10 w-auto group-hover:scale-105 transition-transform duration-300">
                    <span class="text-2xl font-serif font-bold text-[#4E030E] tracking-wider hidden sm:block">
                        KAYUKAYUKU
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-6 items-center">
                <a href="{{ route('company') }}"
                    class="text-[#4E030E] font-medium hover:text-[#A67C52] transition-colors duration-300 font-sans">
                    {{ __('Tentang') }}
                </a>

                @role('customer')
                <a href="{{ route('barang') }}"
                    class="text-[#4E030E] font-medium hover:text-[#A67C52] transition-colors duration-300 font-sans">
                    {{ __('Barang') }}
                </a>
                @endrole

                <div class="w-px h-6 bg-[#E6CCB2] mx-2"></div>

                @guest
                <button onclick="toggleModal('login-modal')"
                    class="px-5 py-2 rounded-full border border-[#4E030E] text-[#4E030E] hover:bg-[#4E030E] hover:text-white transition-all duration-300 font-medium text-sm">
                    {{ __('Masuk') }}
                </button>
                @if (Route::has('register'))
                <button onclick="toggleModal('register-modal')"
                    class="px-5 py-2 rounded-full bg-[#4E030E] text-white hover:bg-[#3D020B] transition-all duration-300 font-medium text-sm shadow-md hover:shadow-lg">
                    {{ __('Daftar') }}
                </button>
                @endif
                @else
                <div class="relative group">
                    <button class="flex items-center space-x-2 text-[#4E030E] font-medium focus:outline-none py-2">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 fill-current opacity-70" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div
                        class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-[#E6CCB2] rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform z-50 overflow-hidden">
                        <div class="py-1">
                            {{-- Mobile-only items shown in dropdown for desktop convenience if window shrinks slightly
                                --}}
                            <a href="{{ route('company') }}"
                                class="lg:hidden block px-4 py-2 text-sm text-[#4E030E] hover:bg-[#FAF6F1]">
                                {{ __('Tentang') }}
                            </a>

                            @role('customer')
                            <div class="border-b border-[#E6CCB2]/30 my-1"></div>
                            <a href="{{ route('profile', Auth::user()->id) }}"
                                class="flex items-center px-4 py-2 text-sm text-[#4E030E] hover:bg-[#FAF6F1]">
                                <i class="fa-solid fa-user-alt w-5 mr-2 text-[#A67C52]"></i> {{ __('Profil') }}
                            </a>
                            <a href="{{ route('carts.index') }}"
                                class="flex items-center px-4 py-2 text-sm text-[#4E030E] hover:bg-[#FAF6F1]">
                                <i class="fa-solid fa-cart-shopping w-5 mr-2 text-[#A67C52]"></i> {{ __('Keranjang') }}
                            </a>
                            <a href="{{ route('orders.index') }}"
                                class="flex items-center px-4 py-2 text-sm text-[#4E030E] hover:bg-[#FAF6F1]">
                                <i class="fas fa-boxes w-5 mr-2 text-[#A67C52]"></i> {{ __('Pesanan') }}
                            </a>
                            @endrole

                            @role('admin')
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center px-4 py-2 text-sm text-[#4E030E] hover:bg-[#FAF6F1]">
                                <i class="fa-solid fa-chart-line w-5 mr-2 text-[#A67C52]"></i> {{ __('Dashboard') }}
                            </a>
                            @endrole

                            <div class="border-b border-[#E6CCB2]/30 my-1"></div>

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="flex items-center px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                                <i class="fa-solid fa-arrow-right-from-bracket w-5 mr-2"></i> {{ __('Keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-[#4E030E] hover:text-[#A67C52] focus:outline-none p-2">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-[#E6CCB2] shadow-inner">
        <div class="px-4 pt-4 pb-6 space-y-3">
            <a href="{{ route('company') }}" class="block text-[#4E030E] font-medium py-2 border-b border-gray-100">
                {{ __('Tentang') }}
            </a>
            <a href="{{ route('test') }}" class="block text-[#4E030E] font-medium py-2 border-b border-gray-100">
                Testing Note
            </a>

            @role('customer')
            <a href="{{ route('barang') }}" class="block text-[#4E030E] font-medium py-2 border-b border-gray-100">
                {{ __('Barang') }}
            </a>
            @endrole

            @guest
            <div class="pt-4 flex flex-col gap-3">
                <button onclick="toggleModal('login-modal')"
                    class="w-full text-center py-3 rounded-xl border border-[#4E030E] text-[#4E030E] font-bold">
                    {{ __('Masuk') }}
                </button>
                @if (Route::has('register'))
                <button onclick="toggleModal('register-modal')"
                    class="w-full text-center py-3 rounded-xl bg-[#4E030E] text-white font-bold shadow-md">
                    {{ __('Daftar') }}
                </button>
                @endif
            </div>
            @else
            <div class="pt-4 mt-2 border-t border-[#E6CCB2]">
                <div class="flex items-center gap-3 mb-4 px-2">
                    <div class="bg-[#FDFBF7] p-2 rounded-full border border-[#E6CCB2]">
                        <svg class="w-6 h-6 text-[#4E030E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-[#A67C52]">Hello,</p>
                        <p class="font-bold text-[#4E030E]">{{ Auth::user()->name }}</p>
                    </div>
                </div>

                @role('customer')
                <a href="{{ route('profile', Auth::user()->id) }}"
                    class="block px-4 py-3 rounded-lg text-[#4E030E] hover:bg-[#FAF6F1] font-medium">
                    <i class="fa-solid fa-user-alt w-6 mr-1 opacity-70"></i> {{ __('Profil') }}
                </a>
                <a href="{{ route('carts.index') }}"
                    class="block px-4 py-3 rounded-lg text-[#4E030E] hover:bg-[#FAF6F1] font-medium">
                    <i class="fa-solid fa-cart-shopping w-6 mr-1 opacity-70"></i> {{ __('Keranjang') }}
                </a>
                <a href="{{ route('orders.index') }}"
                    class="block px-4 py-3 rounded-lg text-[#4E030E] hover:bg-[#FAF6F1] font-medium">
                    <i class="fas fa-boxes w-6 mr-1 opacity-70"></i> {{ __('Pesanan') }}
                </a>
                @endrole

                @role('admin')
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-3 rounded-lg text-[#4E030E] hover:bg-[#FAF6F1] font-medium">
                    <i class="fa-solid fa-chart-line w-6 mr-1 opacity-70"></i> {{ __('Dashboard') }}
                </a>
                @endrole

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="block px-4 py-3 mt-2 rounded-lg text-red-700 bg-red-50 hover:bg-red-100 font-medium">
                    <i class="fa-solid fa-arrow-right-from-bracket w-6 mr-1"></i> {{ __('Keluar') }}
                </a>
            </div>
            @endguest
        </div>
    </div>
</nav>

{{-- Include the Modals --}}
@include('includes.auth-modals')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
        }
    });
</script>