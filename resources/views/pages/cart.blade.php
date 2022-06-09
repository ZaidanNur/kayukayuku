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
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container cart">
        <h1 class="cart-title">Keranjang</h1>
        @if ($cart_items != null)
            @foreach ($cart_items as $item)
                <section class="cart-items">
                    <div class="card mb-3 h-100" style="max-width: 1080px; max-height:220px">
                        <div class="row g-0 align-items-center">
                        <div class="col-md-3">
                            @php
                                $isImage = false;
                            @endphp
                            @foreach ($galleries as $gallery)
                                @if ($gallery->product_id == $item->product_id)
                                    <img src="{{ Storage::url($gallery->image) }}" style="max-width: 270px; max-height: 200px" class="img-fluid rounded-start m-2" alt="...">
                                    @php
                                        $isImage=true;
                                    @endphp
                                    @break                         
                                @endif
                            @endforeach

                            @if ($isImage)
                                        
                            @else
                                <img src="{{ url("images\img-not-found.jpg") }}" style="max-height:190px" class="img-fluid rounded-start" alt="...">
                            @endif
                            
                        </div>
                        <div class="col-md-8 ms-1">
                            <div class="card-body">
                            <h4 class="card-title"><strong>{{ $item->product->product_name }}</strong></h4>
                            <p class="card-text product-price">@currency($item->product->product_price)</p>
                            @livewire('product-amount', ['item' => $item,'product_name'=>$item->product->product_name])
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
    </div>
@endsection

@include('pages.modals')

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.card').on('click','#btnPesan',function () {
                var btn = $(this).closest('#btnPesan');
                var produc_id = btn.data('product');
                var product_name = btn.data('productname');
                var cart_id = btn.data('cart');
                var amount = btn.data('amount');

                $('#product-id').val(produc_id);
                $('#cart-id').val(cart_id);
                $('#amount').val(amount);
                $('#productName').val(product_name);
            });
        });
    </script>
@endpush
