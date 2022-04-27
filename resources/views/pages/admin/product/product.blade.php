@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
    <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
</div>

    <div class="container-fluid pt-4 px-3">
        <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#createProductModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah
        </a>
    </div>

    <div class="row px-3">
        <div class="card-body">
                <table class="table table-bordered table-striped" data-order='[[ 1, "asc" ]]' data-page-length='25' id="productTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Nama Produk
                            </th>
                            <th colspan="4">
                                Foto
                            </th>
                            <th colspan="2">
                                Stok
                            </th>
                            <th colspan="2">
                                Harga
                            </th>
                            <th colspan="3">
                                Deskripsi
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse ($items as $item)
                        {{-- 'product_name','slug','product_stock','product_price','product_description' --}}
                        <tr>
                            <td colspan="2">{{ $item-> product_name }}</td>
                            <td colspan="4">
                                @foreach ($galleries as $galerry)
                                    @if ($galerry->product_id == $item->id)
                                        <img src="{{ $galerry->image }}" alt="{{ $item->product_name }}" width="200px">  
                                        @break                         
                                    @endif                                  
                                @endforeach
                            </td>
                            <td colspan="2">{{ $item-> product_stock }}</td>
                            <td colspan="2">@currency($item->product_price)</td>
                            <td colspan="3">{{ $item-> product_description }}</td>
                            <td class="table-action">
                                <a href="{{ route('products.edit',$item->id) }}" class="btn btn-info text-white"><i class="fa-solid fa-pen-to-square">
                                    </i>
                                </a>

                                <form action="{{ route('products.destroy',$item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>

                            </td>
                            
                        </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
    </div>

    @include('pages.admin.product.modal')
    @push('script-after')

    @endpush
    
    
@endsection