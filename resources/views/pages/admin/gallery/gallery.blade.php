@extends('layouts.admin')

@push('style-after')
@endpush

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Data Gambar</h1>
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

        <a href='#' class="btn-sm btn-add-product btn-primary shadow-s" data-bs-toggle="modal" data-bs-target="#createGalleryModal">
            <i class="fa-solid fa-circle-plus me-2"></i>Tambah
        </a>
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
                                Image
                            </th>
                            <th colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @forelse ($items as $item)
                        {{-- 'gallery_name','slug','gallery_stock','gallery_price','gallery_description' --}}
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
                                @foreach ($products as $product)
                                    @if ($item->product_id == $product->id)
                                        {{ $product->product_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td colspan="4">
                                <img class="img-thumbnail" src="{{ Storage::url($item->image) }}" alt="Product image" width="200px">  
                            </td>
                            <td class="table-action">
                                {{-- href="{{ route('galleries.edit',$item->id) }}"  --}}
                                {{-- <a href="{{ route('gallery-details',$item->id) }}" class="btn btn-edit btn-info text-white" style="min-width: 45px">
                                    <i class="fa-solid fa-eye"></i>
                                </a> --}}
                                <a class="btn btn-edit btn-info text-white" style="min-width: 45px"  data-bs-toggle="modal" data-bs-target="#editGalleryModal"><i class="fa-solid fa-pen-to-square" >
                                    </i>
                                </a>

                                <form action="{{ route('galleries.destroy',$item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" style="min-width: 45px; ">
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