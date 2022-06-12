@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

    <div class="container-fluid p-3">
        <div class="d-flex">
            <img class="me-3" src="{{ Storage::url($payment->payment_proof) }}" alt="Payment Proof" style="max-width: 50%">
            
            <div class="flex-grow-1">
                <div>
                    <h2>Detail Pesanan</h2>
                    <p>Order ID      : {{ $payment->order->id }}</p>
                    <p>Nama Customer : {{ $payment->order->name }}</p>
                    <p>Alamat        : {{ $payment->order->address }}</p>
                    <p>Nomor Telepon : {{ $payment->order->phone_number }}</p>
                </div>
                <h3 class="mt-4">Barang dipesan :</h3>
                <div class="d-flex  align-items-center justify-content-between me-4">
                    <div>
                        <h6>{{ $payment->order->product->product_name }}</h6>
                        <strong>@currency($payment->order->product->product_price)</strong>
                    </div>
                    <div>
    
                        <h6><strong>{{ $payment->order->amount }} x</strong></h6>
                    </div>
                </div>

                <div class="mt-3">
                    <h4>Total : @currency($payment->order->product->product_price * $payment->order->amount)</h4>
                </div>

                <div class="d-flex gap-4 mt-3">
                    <a class="btn btn-success rounded-pill" href="{{ route('order-admin.payment-confirmation-accept',$payment->id) }}">Terima</a>
                    <a class="btn btn-danger rounded-pill" href="{{ route('order-admin.payment-confirmation-rejected',$payment->id) }}">Tolak</a>
                </div>
            </div>
            
        </div>
    </div>
@endsection