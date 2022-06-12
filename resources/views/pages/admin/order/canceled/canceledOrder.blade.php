@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')
    

    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
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

        {{-- <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#createProductModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah Data
        </a> --}}
    </div>

    <div class="row px-3">
        <div class="card-body">
                <table class="table table-bordered table-striped" data-order='[[ 1, "asc" ]]' data-page-length='25' id="productTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                Kode Pesanan
                            </th>
                            <th>
                                Nama Customer
                            </th>
                            <th>
                                Alamat Customer
                            </th>
                            <th>
                                Nomor Telepon
                            </th>
                            <th>
                                Barang Pembelian
                            </th>
                            <th>
                                Catatan
                            </th>
                            <th>
                                Status Pesanan
                            </th>
                            <th>
                                Tanggal Pesanan
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if ($cancel_orders->count()>0)
                            @foreach ($cancel_orders as $cancel_order)
                                    <tr  class="content-row">
                                        <td>
                                            {{ $cancel_order->order->id }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->name }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->address }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->phone_number }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->product->product_name }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->note }}
                                        </td>
                                        <td>
                                            {{ $cancel_order->order->status }}
                                            @if ($cancel_order->order->status == 'Pesanan Diproses')
                                                <form action="{{ route('order-admin.order-status-change') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $cancel_order->order->id }}">
                                                    <select class="form-select" name="status" onchange="this.form.submit()" aria-label="Default select example">
                                                        <option value="{{ $cancel_order->order->status }}">{{ $cancel_order->order->status }}</option>
                                                        <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                                                    </select>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d/m/Y', strtotime($cancel_order->order->order_date)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('order-admin.order-detail',$cancel_order->order) }}" class="btn btn-edit btn-info text-white" style="min-width: 45px;margin: 5px">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @if ($cancel_order->order->status == 'Menunggu Konfirmasi Admin')
                                            <a href="{{ route('order-admin.payment-confirmation',$cancel_order->order->id) }}" class="btn btn-edit btn-success text-white" style="max-width: 100px;margin: 5px">
                                                Konfirmasi
                                            </a>
                                            @endif
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

    {{-- @include('pages.admin.product.modal') --}}
    @push('script-after')
        <script>
            // $(document).ready(function () {

            //     $('table').on('click', '.btn-edit', function () {
            //         var $tr = $(this).closest('tr');

            //         var productID = $tr.find('.product-id').html();
            //         var productName = $tr.find('.product-name').html();
            //         var productStock = $tr.find('.product-stock').html();
            //         var productPrice = $tr.find('.product-price').html();
            //         var productDesc = $tr.find('.product-desc').html();

            //         var route = '{{ route("products.update", ":id" ) }}'
            //         var url = route.replace(':id',productID);

                    
            //         var modal = $('.edit-product-modal');
            //         modal.find('input[name="product_name"]').val(productName);
            //         modal.find('input[name="product_stock"]').val(productStock);
            //         modal.find('input[name="product_price"]').val(productPrice); 
            //         modal.find('textarea[name="product_description"]').val(productDesc);
            //         modal.find('form').attr('action',url);
            //     });

            //     $('#btnAddProduct').on('click',function () {
            //         $('#addProduct').submit();
            //     });

            //     $('#simpanProduct').on('click',function () {
            //         $('#createProductModal').modal('hide');
            //     });

            //     $('#backToAddBtn').on('click',function () {
            //         $('#createProductModal').modal('show');
            //     });


            //     $('table').on('click', '.btn-edit-image', function () {
            //         var $tr = $(this).closest('tr');

            //         var galleryID = $tr.find('.gallery-id').html();
            //         var productID = $tr.find('.product-id').html();
            //         var productName = $tr.find('.product-name').html();

            //         var route = '{{ route("galleries.update", ":id" ) }}';
            //         var url = route.replace(':id',galleryID);

                    
            //         var modal = $('.edit-gallery-modal');
            //         modal.find('select[name="product_id"]').find('#selected-prev').html(productName);
            //         modal.find('select[name="product_id"]').find('#selected-prev').val(productID);


            //         modal.find('form').attr('action',url);
            //     });

            //     $('#btnAddGallery').on('click',function () {
            //         $('#addGallery').submit();
            //     });

            //     $('#simpanGallery').on('click',function () {
            //         $('#createGalleryModal').modal('hide');
            //     });

            //     $('#backToAddBtn').on('click',function () {
            //         $('#createGalleryModal').modal('show');
            //     });

            //     $('table').on('click','.btn-add-image',function () {
            //         var $tr = $(this).closest('tr');

            //         var productID = $tr.find('.product-id').html();
            //         var productName = $tr.find('.product-name').html();

                    
            //         var modal = $('.create-gallery-modal');
            //         modal.find('select[name="product_id"]').find('#selected-prev').html(productName);
            //         modal.find('select[name="product_id"]').find('#selected-prev').val(productID);
            //     });

            //     $('table').on('click','.product-stock',function () {
            //         var $tr = $(this).closest('tr');

            //         var productID = $tr.find('.product-id').html();
            //         var productName = $tr.find('.product-name').html();
            //         var route = '{{ route("change-stock.batch", ":id" ) }}';
            //         var url = route.replace(':id',productID);

                    
            //         var modal = $('#stockModal');
            //         modal.find('input[name="product_name"]').val(productName);
            //         modal.find('form').attr('action',url);
            //         $('#stockModal').modal('show');
            //     });
                
            // });
        </script>
    @endpush
    
    

@endsection