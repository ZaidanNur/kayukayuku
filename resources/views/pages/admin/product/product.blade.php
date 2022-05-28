@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    </div>

    <div class="container-fluid pt-4 px-3">
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

        <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#createProductModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah Data
        </a>
    </div>

    <div class="row px-3">
        <div class="card-body">
                <table class="table table-bordered table-striped" data-order='[[ 1, "asc" ]]' data-page-length='25' id="productTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                Nama Produk
                            </th>
                            <th>
                                Foto
                            </th>
                            <th class="text-center">
                                Stok
                            </th>
                            <th>
                                Harga
                            </th>
                            <th style="width: 30%">
                                Deskripsi
                            </th>
                            <th style="width: 5%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if (! $items == null)
                            @foreach ($items as $item)
                            <tr  class="content-row">
                                <td class="product-id" style="display: none;">{{ $item->id }}</td>
                                <td class="product-name" id="productName">{{ $item-> product_name }}</td>
                                <td class="product-img">
                                    @php
                                        $isImage = false;
                                    @endphp
                                    @foreach ($galleries as $gallery)
                                        @if ($gallery->product_id == $item->id)
                                            <div class="d-flex flex-column">
                                                <img src="{{ Storage::url($gallery->image) }}" alt="{{ $item->product_name }}" width="200px">  
                                                <a class="btn-edit-image" href="#" data-bs-toggle="modal" data-bs-target="#editGalleryModal">Edit Foto</a>
                                                <td class="gallery-id" style="display: none;">{{ $gallery->id }}</td>
                                            </div>
                                            @php
                                                $isImage=true;
                                            @endphp
                                            @break                         
                                        @endif
                                    @endforeach

                                    @if ($isImage)
                                        
                                    @else
                                        <a href="#" class="btn btn-primary mx-auto btn-add-image" data-bs-toggle="modal" data-bs-target="#createGalleryModal">Tambah Foto</a>
                                    @endif
                                    
                                </td>
                                <td class="justify-content-center">
                                    @livewire('change-stock', ['item' => $item])
                                </td>
                                <td class="product-price" style="display: none;">{{ $item->product_price }}</td>
                                <td>@currency($item->product_price)</td>
                                <td class="product-desc">{{ $item-> product_description }}</td>
                                <td class="table-action">
                                    {{-- href="{{ route('products.edit',$item->id) }}"  --}}
                                    <a href="{{ route('product-details',$item->id) }}" class="btn btn-edit btn-info text-white" style="min-width: 45px;margin: 5px">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-edit btn-info text-white" style="min-width: 45px;margin: 5px"  data-bs-toggle="modal" data-bs-target="#editProductModal"><i class="fa-solid fa-pen-to-square" >
                                        </i>
                                    </a>

                                    {{-- <form action="{{ route('products.destroy',$item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="min-width: 45px; margin: 5px">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form> --}}

                                </td>
                                
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
    </div>

    @include('pages.admin.product.modal')
    @push('script-after')
        <script>
            $(document).ready(function () {

                $('table').on('click', '.btn-edit', function () {
                    var $tr = $(this).closest('tr');

                    var productID = $tr.find('.product-id').html();
                    var productName = $tr.find('.product-name').html();
                    var productStock = $tr.find('.product-stock').html();
                    var productPrice = $tr.find('.product-price').html();
                    var productDesc = $tr.find('.product-desc').html();

                    var route = '{{ route("products.update", ":id" ) }}'
                    var url = route.replace(':id',productID);

                    
                    var modal = $('.edit-product-modal');
                    modal.find('input[name="product_name"]').val(productName);
                    modal.find('input[name="product_stock"]').val(productStock);
                    modal.find('input[name="product_price"]').val(productPrice); 
                    modal.find('textarea[name="product_description"]').val(productDesc);
                    modal.find('form').attr('action',url);
                });

                $('#btnAddProduct').on('click',function () {
                    $('#addProduct').submit();
                });

                $('#simpanProduct').on('click',function () {
                    $('#createProductModal').modal('hide');
                });

                $('#backToAddBtn').on('click',function () {
                    $('#createProductModal').modal('show');
                });


                $('table').on('click', '.btn-edit-image', function () {
                    var $tr = $(this).closest('tr');

                    var galleryID = $tr.find('.gallery-id').html();
                    var productID = $tr.find('.product-id').html();
                    var productName = $tr.find('.product-name').html();

                    var route = '{{ route("galleries.update", ":id" ) }}';
                    var url = route.replace(':id',galleryID);

                    
                    var modal = $('.edit-gallery-modal');
                    modal.find('select[name="product_id"]').find('#selected-prev').html(productName);
                    modal.find('select[name="product_id"]').find('#selected-prev').val(productID);


                    modal.find('form').attr('action',url);
                });

                $('#btnAddGallery').on('click',function () {
                    $('#addGallery').submit();
                });

                $('#simpanGallery').on('click',function () {
                    $('#createGalleryModal').modal('hide');
                });

                $('#backToAddBtn').on('click',function () {
                    $('#createGalleryModal').modal('show');
                });

                $('table').on('click','.btn-add-image',function () {
                    var $tr = $(this).closest('tr');

                    var productID = $tr.find('.product-id').html();
                    var productName = $tr.find('.product-name').html();

                    
                    var modal = $('.create-gallery-modal');
                    modal.find('select[name="product_id"]').find('#selected-prev').html(productName);
                    modal.find('select[name="product_id"]').find('#selected-prev').val(productID);
                });
                
            });
        </script>
    @endpush
    
    
@endsection