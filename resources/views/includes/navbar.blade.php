<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4">
    <div class="container-fluid">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ url('images\logo 1.png') }}" alt="" width="100">
                <span class="home-title ms-4">KAYUKAYUKU</span>
            </a>
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-5 h-100 me-auto" id="left-navbar-action">
                {{-- <li class="nav-item me-5">
                    <a class="nav-link" href="#">Product</a>
                </li> --}}
                <li class="nav-item me-5">
                    <a class="nav-link" href="{{ route('company') }}" style="color: #4e030e;font-family: Montserrat;
                    font-weight: 400;">{{ __('Tentang') }}</a>
                </li>
                @role('customer')
                    <li class="nav-item me-5">
                        <a class="nav-link" href="{{ route('barang') }}" style="color: #4e030e;font-family: Montserrat;
                        font-weight: 400;">{{ __('Barang') }}</a>
                    </li>
                @endrole

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <div class="btn btn-primary login-button">{{ __('Masuk') }}</div>
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">

                            <div class="btn btn-primary register-button">{{ __('Daftar') }}</div>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- Button trigger modal -->

                            <a class="btn dropdown-item text-center left-navbar-action d-none" href="{{ route('company') }}" style="color: #4e030e;font-family: Montserrat;
                            font-weight: 400;">{{ __('Tentang') }}</a>

                            <div class="dropdown-divider left-navbar-action d-none"></div>
                            @role('customer')
                                    <a class="btn dropdown-item text-center left-navbar-action d-none" href="{{ route('barang') }}" style="color: #4e030e;font-family: Montserrat;
                                    font-weight: 400;">{{ __('Barang') }}</a>
                            @endrole
                            <div class="dropdown-divider left-navbar-action d-none"></div>

                            @role('customer')
                                <a href="{{ route('profile',Auth::user()->id) }}" class="btn dropdown-item d-flex align-items-center">
                                    <div style="width: 2.5rem">
                                        <i class="fa-solid fa-user-alt p-2 me-2"></i>
                                    </div>
                                    <div>
                                        {{ __('Profil') }}
                                    </div>
                                </a>

                                <a href="{{ route('carts.index') }}" class="btn dropdown-item d-flex align-items-center">
                                    <div style="width: 2.5rem">
                                        <i class="fa-solid fa-cart-shopping p-2 me-2"></i>
                                    </div>
                                    <div>
                                        {{ __('Keranjang') }}
                                    </div>
                                </a>
                                <a href="{{ route('orders.index') }}" class="btn dropdown-item d-flex align-items-center">
                                    <div style="width: 2.5rem">
                                        <i class="fas fa-boxes p-2 me-2"></i>
                                    </div>
                                    <div>
                                        {{ __('Pesanan') }}
                                    </div>
                                </a>
                            @endrole

                            @role('admin')
                                    <a href="{{ route('dashboard') }}" class="btn dropdown-item d-flex align-items-center">
                                        <div style="width: 2.5rem">
                                            <i class="fa-solid fa-chart-line p-2 me-2"></i>
                                        </div>
                                        <div>
                                            {{ __('Dashboard') }}
                                        </div>
                                    </a>
                            @endrole
                            <a class="btn dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <div style="width: 2.5rem">
                                    <i class="fa-solid fa-arrow-right-from-bracket p-2 me-2"> </i>
                                </div>
                                <div>
                                    {{ __('Keluar') }}
                                </div>
                            </a>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>
