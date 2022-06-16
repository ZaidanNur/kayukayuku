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
    @endif @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    
    <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#orderAdminModal">
        <i class="fa-solid fa-circle-plus me-2"></i>Tambah Pesanan
    </a>
    <div class="card mt-5">
        <div class="card card-pemasukan-pengeluaran">
            <div class="d-flex border-bottom">
                <div class="d-flex flex-column align-items-center border-end pt-2" style="width: 50%">
                    <h5 style="color: green">Rp 190.000</h5>
                    Pemasukan
                </div>
                <div class="d-flex flex-column align-items-center pt-2" style="width: 50%">
                    <h5 style="color: red">Rp 190.000</h5>
                    Pengeluaran
                </div>
            </div>
            <div class="d-flex justify-content-between keuntungan">
                <div>
                    Keuntungan
                </div>
                <div>
                    <h5 style="color: cornflowerblue">Rp 35.000</h5>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped m-3" data-order='[[ 1, "asc" ]]' data-page-length='25' id="productTable" width='100%' cellspacing="0">
            <thead>
                <tr>
                    <th>
                        Catatan
                    </th>
                    <th>
                        Pemasukan
                    </th>
                    <th>
                        Pengeluaran
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <tr  class="content-row">
                    <td>Ini catatan</td>
                    <td>Rp 50.000</td>
                    <td>Rp 0</td>                      
                </tr>
                <tr  class="content-row">
                    <td>Ini catatan</td>
                    <td>Rp 0</td>
                    <td>Rp 50.000</td>                      
                </tr>
                @if (! $items == null)
                    @foreach ($items as $item)
                    <tr  class="content-row">
                        <td>Ini catatan</td>
                        <td>Rp 50.000</td>
                        <td>Rp 0</td>                      
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



{{-- @include('pages.admin.order.order.modals') --}} @push('script-after')
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