<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                
                <i class="fa fa-bell me-lg-2" id="notification">
                    @if (! $items == null)
                    @foreach ($items as $item)
                        @if ($item->product_stock <= 30)
                        <span class="position-absolute top-30 start-80 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Pemberitahuan</span>
                        </span>
                        @break
                        @endif
                    @endforeach
                @endif
                </i>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" id="notificationList">
                @if (! $items == null)
                    @php
                        $notif = false
                    @endphp
                    @foreach ($items as $item)
                        @if ($item->product_stock <= 30)
                            @php
                                $notif = true
                            @endphp
                            <a href="#" class="dropdown-item" id="notificationItem">
                                <h6 class="fw-normal mb-0">Stok barang <strong>{{ $item->product_name }}</strong> terbatas</h6>
                                <small>Harap menambah stok barang</small>
                            </a>
                            <hr class="dropdown-divider">
                        @endif
                    @endforeach

                    @if ($notif)
                        
                    @else
                        <a href="#" class="dropdown-item" id="notificationItem">
                            <h6 class="fw-normal mb-0">Belum ada notifikasi</h6>
                            
                        </a>
                        <hr class="dropdown-divider">
                    @endif
                @endif
                {{-- <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a> --}}
                {{-- <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a> --}}
                {{-- <hr class="dropdown-divider"> --}}
                {{-- <a href="#" class="dropdown-item text-center">See all notifications</a> --}}
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->username }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <!-- <a href="{{ route('profile',Auth::user()->id) }}" class="dropdown-item">My Profile</a> -->
                <!-- <a href="#" class="dropdown-item">Settings</a> -->
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Out</a>
            </div>
        </div>
    </div>
</nav>
