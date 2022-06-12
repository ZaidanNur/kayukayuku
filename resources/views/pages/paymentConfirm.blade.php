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
        <div class="container-fluid p-3">
            <div class="card p-3">
                <div class="d-flex">
                    @php
                        $isImage = false;
                    @endphp
                    @foreach ($images as $image)
                        @if ($image->product_id == $order->product_id)
                            <img class="p-3" src="{{  Storage::url($image->image) }}" style="max-width: 50%" alt="" srcset="">
                            @php
                                $isImage=true;
                            @endphp
                            @break                         
                        @endif
                    @endforeach

                    @if ($isImage)
                                
                    @else
                        <img src="{{ url("images\img-not-found.jpg") }}" style="max-width: 400px" class="p-3" alt="">
                    @endif

                    <div class="flex-grow-1 ms-2 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex flex-column">
                                <h2>{{ $order->product->product_name }}</h3>
                                <strong>@currency($order->product->product_price)</strong>
                            </div>
                            <p>{{ $order->amount }}X</p>
                        </div>

                        <div class="mb-3">
                            <h3>Total Pembayaran : <strong>@currency($order->product->product_price * $order->amount)</strong></h3>
                        </div>

                        <div class="mb-3">
                            <strong>Transfer melalui : </strong>
                            <ul>
                                <li>
                                    BRI : 2934890183477 A.n Syaiful
                                </li>
                                <li>
                                    Dana : 08182839849 A.n Syaiful
                                </li>
                            </ul>
                        </div>

                        <div>
                            <form action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data">
                                @csrf 

                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="form-group mb-3">
                                    <label for="image">Upload bukti pembayaran</label>
                                    <input class="form-control" id="image" type="file" name="payment_proof" placeholder="Images" required>
                                </div>

                                <button class="btn btn-primary" type="submit">Konfirmasi</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
@endsection

@include('pages.modals')

@push('after-script')
    <script>
        
    </script>
@endpush
