@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<header>
    <div class="text-center">
        <h1>
            Premium Handycraft
        </h1>
        <p>
            100% original & Foodgrade !!
        </p>
        <a href="#" class="btn btn-explore px-4 mt-4">
            EXPLORE
        </a>
    </div>
</header>

<div class="container">
    <section class="section-stats row justify-content-center" id="stats">
        <div class="col-3 col-md-2 stats-detail">
            <h2>
                6000
            </h2>
            <p>
                Sold/Month
            </p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>
                30
            </h2>
            <p>
                City
            </p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>
                4
            </h2>
            <p>
                Countries
            </p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>
                15
            </h2>
            <p>
                Reseller
            </p>
        </div>
    </section>
</div>

<div class="container mt-4">
    <div class="best-selling-product-title">
        PRODUK TERLARIS
    </div>
    <hr>
    <div class="section-best-selling-product row justify-content-start pe-3">
        <!-- 
            Bagian bawah ini nanti di looping
         -->
        <div class="col-4">
            <div class="card product-card mb-3">
                <img src="images/1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Piring Makan Anak/Piring Karakter Kayu</h5>
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>

                    <p class="card-text">Deskripsi Produk :</p>
                    <ul>
                        <li>
                            Bahan baku mahoni
                        </li>
                        <li>
                            Pengerjaan dengan mesin CNC dan amplas
                        </li>
                        <li>
                            Tebal -+2,5 cm
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card product-card mb-3">
                <img src="images/1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Piring Makan Anak/Piring Karakter Kayu</h5>
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>

                    <p class="card-text">Deskripsi Produk :</p>
                    <ul>
                        <li>
                            Bahan baku mahoni
                        </li>
                        <li>
                            Pengerjaan dengan mesin CNC dan amplas
                        </li>
                        <li>
                            Tebal -+2,5 cm
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card product-card mb-3">
                <img src="images/1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Piring Makan Anak/Piring Karakter Kayu</h5>
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>

                    <p class="card-text">Deskripsi Produk :</p>
                    <ul>
                        <li>
                            Bahan baku mahoni
                        </li>
                        <li>
                            Pengerjaan dengan mesin CNC dan amplas
                        </li>
                        <li>
                            Tebal -+2,5 cm
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>


    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 KAYUKAYUKU</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Our Product</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer>
    </div>
@endsection


