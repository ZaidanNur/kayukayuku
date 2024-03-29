<!DOCTYPE html>
<html lang="en">

@include('includes.admin.head')

<body>
    <style>
        .content{
            /* width:fit-content */
        }
        .navbar{
            width: 100%;
            position: relative;
            /* left: 200px; just an estimate of your sidebar's width */
            /* width: calc(100% - 200px); */
            }
    </style>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        @include('includes.admin.loading')
        @include('includes.admin.sidebar')

        <!-- Content Start -->
        <div class="content">
            @include('includes.admin.navbar')
            @include('pages.modals')
            @yield('content')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ url("backend/dashboard/lib/chart/chart.min.js") }}"></script>
    <script src="{{ url("backend/dashboard/lib/easing/easing.min.js") }}"></script>
    <script src="{{ url('backend/dashboard/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ url('backend/dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>



    <!-- Template Javascript -->
    <script src="{{ url('backend/dashboard/js/main.js') }}"></script>
    <script>

    </script>
    @livewireScripts
    @stack('script-after')
</body>

</html>
