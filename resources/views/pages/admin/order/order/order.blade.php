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

        <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#orderAdminModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah Pesanan
        </a>
        
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
                        @if ($orders->count()>0)
                            @foreach ($orders as $order)
                                @if ($order->status != 'Pembayaran Ditolak' && $order->status != 'Dibatalkan Oleh Customer' && $order->status != 'Dibatalkan')
                                    <tr  class="content-row">
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            {{ $order->address }}
                                        </td>
                                        <td>
                                            {{ $order->phone_number }}
                                        </td>
                                        <td>
                                            {{ $order->product->product_name }}
                                        </td>
                                        <td>
                                            {{ $order->note }}
                                        </td>
                                        <td>
                                            
                                            @if ($order->user_id != null && $order->status == 'Pesanan Diproses')
                                                <form action="{{ route('order-admin.order-status-change') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    <select class="form-select" name="status" onchange="this.form.submit()" aria-label="Default select example">
                                                        <option value="{{ $order->status }}">{{ $order->status }}</option>
                                                        <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                                                    </select>
                                                </form>
                                            @elseif ($order->user_id==null)
                                                <form action="{{ route('order-admin.order-status-change') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    <select class="form-select" name="status" onchange="this.form.submit()" aria-label="Default select example">
                                                        <option value="{{ $order->status }}">{{ $order->status }}</option>
                                                        <option value="Pesanan Diproses">Pesanan Diproses</option>
                                                        <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                                                        <option value="Terkirim">Terkirim</option>
                                                        <option value="Dibatalkan">Pesanan Dibatalkan</option>
                                                    </select>
                                                </form>
                                            @else
                                                {{ $order->status }}
                                            @endif

                                            

                                        </td>
                                        <td>
                                            {{ date('d/m/Y', strtotime($order->order_date)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('order-admin.order-detail',$order) }}" class="btn btn-info text-white" style="min-width: 45px;margin: 5px">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="btn btn-edit btn-info text-white" style="min-width: 45px;margin: 5px"  data-bs-toggle="modal" data-bs-target="#orderAdminEditModal"
                                            data-id="{{ $order->id }}" data-jumlah="{{ $order->amount }}" data-name="{{ $order->name }}" data-alamat="{{ $order->address }}" data-phone="{{ $order->phone_number }}" data-note="{{ $order->note }}" data-status="{{ $order->status }}"
                                            >
                                                <i class="fa-solid fa-pen-to-square" ></i>
                                            </a>
                                            @if ($order->status == 'Menunggu Konfirmasi Admin')
                                            <a href="{{ route('order-admin.payment-confirmation',$order->id) }}" class="btn btn-edit btn-success text-white" style="max-width: 100px;margin: 5px">
                                                Konfirmasi
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
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

    @include('pages.admin.order.order.modals')
    @push('script-after')
        <script>
            $(document).ready(function () {
                // data-id="{{ $order->id }}" data-name="{{ $order->name }}" data-alamat="{{ $order->address }}" data-phone="{{ $order->phone_number }}" data-note="{{ $order->note }}" data-status="{{ $order->status }}
                $('table').on('click', '.btn-edit', function () {
                    var order_id = $(this).data('id');
                    var name = $(this).data('name');
                    var jumlah = $(this).data('jumlah');
                    var alamat = $(this).data('alamat');
                    var phone = $(this).data('phone');
                    var note = $(this).data('note');
                    var status = $(this).data('status');

                    var route = '{{ route("order-admin.order-edit", ":id" ) }}'
                    var url = route.replace(':id',order_id);

                    
                    var modal = $('#orderAdminEditModal');
                    modal.find('input[name="name"]').val(name);
                    modal.find('input[name="amount"]').val(jumlah);
                    modal.find('textarea[name="address"]').val(alamat); 
                    modal.find('input[name="phone_number"]').val(phone); 
                    modal.find('input[name="status"]').val(status); 
                    modal.find('textarea[name="note"]').val(note);
                    modal.find('form').attr('action',url);
                });

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
                
            });
        </script>
    @endpush
    
    

@endsection