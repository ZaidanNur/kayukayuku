@extends('layouts.app')

@section('content')

    <section class="company-profile">
        <div class="container-fluid">
            <div class="top-content">
                <div class="d-flex p-2 bd-highlight left-content">
                    <div class="container img-profile">
                    </div>
                    <div class="text">
                        <h3>
                            DESKRIPSI
                        </h3>
                        <p>
                            KayuKayuKu merupakan sebuat home industry yang menjual berbagai macam kerajinan. Dengan bahan baku utama kayu, produk yang dihasilkan dijamin aman dan awet. Tersedia banyak pilihan variasi produk yang berkualitas dengan harga terjangkau.
                        </p>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="container-fluid  right-content">
                    </div>
                </div>
            </div>
            <div class="bot-content">
                <div class="d-flex flex-column align-items-center bd-highlight left-content">
                    <h3>
                        KONTAK
                    </h3>
                    <h2>
                        0853-3934-0000
                    </h2>

                </div>
                <div class="d-flex bd-highlight">
                    <div class="row right-content">
                        <div class="col align-self-center">
                            <h3>PLATFORM</h3>
                        </div>
                        <div class="col-auto align-self-center justify-content-end platform">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <p>Kayukayuku Indonesia</p>
                                </div>
                                <div class="col-auto"><img src="images/facebook.png" width="25px" height="25px" alt="Facebook"></div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <p>kayukayuku_id</p>
                                </div>
                                <div class="col-auto"><img src="images/instagram.png" width="25px" height="25px" alt="Facebook"></div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <p>kayukayuku_id</p>
                                </div>
                                <div class="col-auto"><img src="images/tokopedia.png" width="25px" height="25px" alt="Facebook"></div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <p>kayukayuku_id</p>
                                </div>
                                <div class="col-auto"><img src="images/shopee.png" width="25px" height="25px" alt="Facebook"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center logo-mid">
                <div class="col-auto">
                    <img src="images/PP.png" height="100px" alt="">
                </div>
            </div>


        </div>
    </section>

<div class="container mt-4 product-collection">
    <div class="best-selling-product-title text-center">
        KOLEKSI PRODUCT
    </div>
    <hr>
    <div class="section-best-selling-product row justify-content-start pe-3">
        <!-- 
            Bagian bawah ini nanti di looping
         -->
        @foreach ($items as $item)
            <div class="col-4">
                <div class="card product-card mb-3">
                    @php
                        $is_image = false
                    @endphp

                    @foreach ($galleries as $gallery)
                        @if ($gallery->product_id == $item->id)
                            <img src="{{ $gallery->image }}" class="card-img-top" alt="...">
                            @php
                                $is_image = true
                            @endphp
                        @endif
                    @endforeach

                    @if ($is_image)
                        
                    @else
                    <img src="{{ url("images/img-not-found.jpg") }}" class="card-img-top" alt="...">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->product_name }}</h5>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>

                        <p class="card-text">{{ $item->product_description }}</p>
                        {{-- <ul>
                            <li>
                                Bahan baku mahoni
                            </li>
                            <li>
                                Pengerjaan dengan mesin CNC dan amplas
                            </li>
                            <li>
                                Tebal -+2,5 cm
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        @endforeach


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


