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

    
    <div class="container order">
        <div class="card">
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <div class="d-flex justify-content-start">
                            @php
                                $isImage = false;
                            @endphp
                            @foreach ($images as $image)
                                @if ($image->product_id == $order->product_id)
                                    <img class="p-3" src="{{  Storage::url($image->image) }}" style="max-width: 240px" alt="" srcset="">
                                    @php
                                        $isImage=true;
                                    @endphp
                                    @break                         
                                @endif
                            @endforeach

                            @if ($isImage)
                                        
                            @else
                                <img src="{{ url("images\img-not-found.jpg") }}" style="max-width: 240px" class="p-3" alt="">
                            @endif
                        <div class="flex-grow-1 pe-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                                <div>
                                    <h2>{{ $order->product->product_name }}</h2>
                                    <strong>@currency($order->product->product_price)</strong>
                                </div>
                                <div>
                                    <button class="btn btn-primary">Konfirmasi Pembayaran</button>
                                    <a href="{{ route('orders.show',$order) }}" class="btn btn-primary">Detail Pesanan</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    {{ $order->amount }} barang
                                </div>
                                <div>
                                    Total pesanan : <span id="hargaBarang">@currency($order->product->product_price * $order->amount)</span>
                                </div>
                            </div>
                            <span>Status : <strong> {{ $order->status }}</strong></span>
                        </div>
                    </div>
                @endforeach
            @else
                
            @endif
        </div>
    </div>
@endsection

@include('pages.modals')

@push('after-script')
    <script>
        
    </script>
@endpush
