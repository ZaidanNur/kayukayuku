@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@guest
@else
<div class="container mt-4">
    <div class="best-selling-product-title">
        DATA BARANG
    </div>
    <hr>
    <div class="section-best-selling-product row justify-content-start pe-3">
        <!-- 
            Bagian bawah ini nanti di looping
         -->
        @foreach ($items as $item)
            <div class="col-4 my-3">
                <div class="card product-card mb-3 h-100">
                    @php
                        $is_image = false
                    @endphp

                    @foreach ($galleries as $gallery)
                        @if ($gallery->product_id == $item->id)
                            <img src="{{ Storage::url($gallery->image) }}" class="card-img-top" alt="...">
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
                        <p class="card-text" id="id-produk" style="display: none">{{ $item->id }}</p>
                        <p class="card-text">@currency($item->product_price)</p>
                        <p class="card-text">{{ $item->product_description }}</p>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endguest


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

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.col-4').on('click',function () {
                var productCard = $(this).find('.card');
                var idProduk = productCard.find('#id-produk').html();
                var route = "{{ route('product-details',':id') }}";
                var url = route.replace(':id',idProduk);
                location.href = url;
            });
        });
    </script>
@endpush
