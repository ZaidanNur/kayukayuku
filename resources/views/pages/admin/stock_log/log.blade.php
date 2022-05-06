@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Data Riwayat Stok Barang</h1>
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
    </div>

    <div class="row px-3">
        <div class="card-body">
                <table class="table table-bordered table-striped" data-order='[[ 1, "asc" ]]' data-page-length='25' id="galleryTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="2">
                                No
                            </th>
                            <th colspan="4">
                                Produk
                            </th>
                            <th colspan="2">
                                Produk Ditambah
                            </th>
                            <th colspan="2">
                                Produk Dikurang
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @forelse ($items as $item)
                        <tr  class="content-row">
                            <td colspan="2">
                                {{ $num }}
                                @php
                                    $num++;
                                @endphp
                            </td>
                            <td id="product-id" style="display: none">
                                {{ $item->product_id }}
                            </td>
                            <td id="gallery-id" style="display: none">
                                {{ $item->id }}
                            </td>
                            <td id="product-name" colspan="2">
                                
                                    {{$item->product ? $item->product->product_name : "Data telah dihapus" }}
                            </td>
                            <td colspan="4">
                                {{ $item->stock_added }}
                            </td>
                            <td colspan="4">
                                {{ $item->stock_reduced }}
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

    @include('pages.admin.gallery.modal')
    @push('script-after')
        <script>
            $(document).ready(function () {

                $('table').on('click', '.btn-edit', function () {
                    var $tr = $(this).closest('tr');

                    var galleryID = $tr.find('#gallery-id').html();
                    var productID = $tr.find('#product-id').html();
                    var productName = $tr.find('#product-name').html();

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
                
            });
        </script>
    @endpush
    
    
@endsection