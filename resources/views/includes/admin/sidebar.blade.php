<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Dashbord Admin</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->username }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('products.index') }}" class="nav-item nav-link {{ request()->is('products') ? 'active' : ''}} {{ request()->is('dashboard') ? 'active' : ''}}"><i class="fa fa-cubes-stacked me-2"></i>Data Barang</a>
            {{-- <a href="{{ route('galleries.index') }}" class="nav-item nav-link {{ request()->is('galleries') ? 'active' : ''}}"><i class="fa fa-images me-2"></i>Galleries</a> --}}
            <a href="{{ route('changes_logs.index') }}" class="nav-item nav-link {{ request()->is('changes_logs') ? 'active' : ''}}" style="font-size: 18px"><i class="fa fa-clipboard-list me-2"></i>Riwayat Stok</a>
            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->