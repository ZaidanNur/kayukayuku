@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

    
    <div class="d-flex flex-column gap-4 align-items-center justify-content-center h-100" style="padding-bottom: 200px; padding-right: 150px">
            <a class="btn btn-primary" style="width: 300px;" href="{{ route('order-admin.order') }}">Pesanan</a>
            <a class="btn btn-primary"  style="width: 300px;" href="{{ route('order-admin.canceled-order') }}">Pembatalan</a>
    </div>

@endsection