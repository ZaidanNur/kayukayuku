<!DOCTYPE html>
<html lang="en">

@include('includes.admin.head')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('includes.admin.loading')
        @include('includes.admin.sidebar')

        <!-- Content Start -->
        <div class="content">
            @include('includes.admin.navbar')
            @include('modal.logoutConfirm')
            @yield('content')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url("backend/dashboard/lib/chart/chart.min.js") }}"></script>
    <script src="{{ url("backend/dashboard/lib/easing/easing.min.js") }}"></script>
    <script src="{{ url('backend/dashboard/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>



    <!-- Template Javascript -->
    <script src="{{ url('backend/dashboard/js/main.js') }}"></script>

    @stack('script-after')
</body>

</html>