@extends('layouts.admin') @push('style-after')
<style>
    .note-column {
        max-width: 250px;
        word-wrap: break-word;
    }
    
    .address-column {
        max-width: 250px;
        word-wrap: break-word;
    }
</style>
@endpush @section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
    <h1 class="h3 mb-0 text-gray-800">Data Keuangan</h1>
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
    @endif @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    
    <div class="d-flex">
        {{-- <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#createPengeluaranModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah Pengeluaran
        </a> --}}
        <a href='#' class="btn btn-add-product btn-primary shadow-s rounded-pill px-2 me-3">
            Semua
        </a>
        <a href='{{ route('keuangan.pengeluaran') }}' class="btn btn-add-product btn-outline-primary shadow-s rounded-pill px-2 me-3" style="color:#009CFF">
            Pengeluaran
        </a>
        <a href='{{ route('keuangan.pemasukan') }}' class="btn btn-add-product btn-outline-primary shadow-s rounded-pill px-2 me-3 " style="color:#009CFF">
            Pemasukan
        </a>

    </div>
    <div class="card mt-5 p-3 pe-3" style="">
        <div class="card card-pemasukan-pengeluaran">
            <div class="d-flex border-bottom">
                <div class="d-flex flex-column align-items-center border-end pt-2" style="width: 50%">
                    <h5 style="color: #0be881">@currency($pemasukan->total_pemasukan)</h5>
                    Pemasukan
                </div>
                <div class="d-flex flex-column align-items-center pt-2" style="width: 50%">
                    <h5 style="color: #ff5e57">@currency($pengeluaran->total_pengeluaran)</h5>
                    Pengeluaran
                </div>
            </div>
            <div class="d-flex justify-content-between keuntungan">
                <div>
                    Keuntungan
                </div>
                <div>
                    <h5 style="color: cornflowerblue">@currency($pemasukan->total_pemasukan-$pengeluaran->total_pengeluaran)</h5>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped ;me-4 mb-4" data-order='[[ 1, "asc" ]]' data-page-length='25' id="productTable" width='100%' cellspacing="0">
            <thead>
                <tr>
                    <th>
                        Nama Barang
                    </th>
                    <th style="width: 10%">
                        Keterangan
                    </th>
                    <th class="text-center">
                        Pemasukan
                    </th>
                    <th class="text-center">
                        Pengeluaran
                    </th>
                </tr>
            </thead>
            
            <tbody>
                @if ($keuangan)
                    @foreach ($keuangan as $item)
                        <tr class="content-row">
                            <td>{{ $item->nama_barang }}</td>
                            <td style="width: 20%">{{ $item->keterangan }}</td>
                            <td class="text-center" style="color: #0be881">@currency($item->jumlah_pemasukan)</td>
                            <td class="text-center" style="color: #ff5e57">@currency($item->jumlah_pengeluaran)</td>     
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



@include('pages.admin.keuangan.modals') 
@push('script-after')
<script>
    $(document).ready(function() {
        $('table').on('click', '.btn-edit', function() {
            var order_id = $(this).data('id');
            var name = $(this).data('name');
            var jumlah = $(this).data('jumlah');
            var alamat = $(this).data('alamat');
            var phone = $(this).data('phone');
            var note = $(this).data('note');
            var status = $(this).data('status');

            var route = '{{ route("order-admin.order-edit", ":id" ) }}'
            var url = route.replace(':id', order_id);


            var modal = $('#orderAdminEditModal');
            modal.find('input[name="name"]').val(name);
            modal.find('input[name="amount"]').val(jumlah);
            modal.find('textarea[name="address"]').val(alamat);
            modal.find('input[name="phone_number"]').val(phone);
            modal.find('input[name="status"]').val(status);
            modal.find('textarea[name="note"]').val(note);
            modal.find('form').attr('action', url);
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
@endpush @endsection