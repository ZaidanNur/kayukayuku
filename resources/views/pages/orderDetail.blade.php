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

    <div class="container-fluid order-detail">
        <div class="card p-4">
            <strong>{{ $order->id }}</strong>
            <strong>{{ Auth::user()->name }}</strong>
            <strong>{{ $order->address }}</strong>
            <strong>{{ $order->phone_number }}</strong>

            <div class="d-flex order-detail-barang align-items-center justify-content-between m-3 p-3 px-3">
                <div class="d-flex flex-column">
                    <strong>{{ $order->product->product_name }}</strong>
                    <strong>@currency($order->product->product_price)</strong>
                </div>
                <div>
                    <strong>{{ $order->amount }} x</strong>
                </div>
            </div>

            <div class="d-flex justify-content-between border-bottom">
                <p>Catatan : </p>
                <div>
                    <span>{{ $order->note }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between border-bottom">
                <p>Status Pesanan : </p>
                <strong>{{ $order->status }}</strong>
            </div>

            <div class="d-flex justify-content-between">
                <p>Tanggal Pesanan : </p>
                <strong>{{ date('d/m/Y', strtotime($order->order_date)) }}</strong>
            </div>
        </div>
    </div>

@endsection

@include('pages.modals')

@push('after-script')
    <script>
        
    </script>
@endpush
