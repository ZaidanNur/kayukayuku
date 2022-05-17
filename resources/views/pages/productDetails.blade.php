@extends('layouts.app')

@section('content')

    <section class="product-details">
        <div class="container">
            <div class="card p-3">
                <div class="img-top">
                    @php
                        $is_image = false
                    @endphp

                    @foreach ($galleries as $gallery)
                        @if ($gallery->product_id == $item->id)
                            <img src="{{ Storage::url($gallery->image) }}" class="img-fluid" alt="{{ $item->product_name }}">
                            @php
                                $is_image = true
                            @endphp
                        @endif
                    @endforeach

                    @if ($is_image)
                        
                    @else
                    <img src="{{ url("images/img-not-found.jpg") }}" class="img-fluid" alt="...">
                    @endif
                    
                <div class="card-content">
                    <h1 class="pt-2">{{ $item->product_name }}</h1>
                    <h4 >@currency($item->product_price)</h4>
                    <p>{{ $item->product_description }}</p>
                </div>
            </div>
        </div>
    </section>



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


