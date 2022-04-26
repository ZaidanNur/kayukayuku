<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('images\logo 1.png') }}" alt="" width="100">
            <span class="home-title ms-4">KAYUKAYUKU</span>
            
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <div class="btn btn-primary login-button">{{ __('Login') }}</div>
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">
                                
                            <div class="btn btn-primary register-button">{{ __('Register') }}</div>
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
                            <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fa-solid fa-arrow-right-from-bracket p-2  me-2"> </i>{{ __('Logout') }}
                            </button>
                            <a href="{{ route('profile',Auth::user()->id) }}" class="btn dropdown-item">
                                <i class="fa-solid fa-user-alt p-2 rounded-circle border border-secondary me-2"></i>{{ __('Profile') }}</a>
                            @role('admin')
                                    <a href="{{ route('dashboard') }}" class="btn dropdown-item">
                                        <i class="fa-solid fa-chart-line me-2"></i>{{ __('Dashboard') }}
                                    </a>
                            @endrole
                            
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>