@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Produk {{ $item->gallery_name }}</h1>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('galleries.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="gallery_name">Nama Produk</label>
                    <input class="form-control" type="text" name="gallery_name" value="{{ $item->gallery_name }}">
                </div>

                <div class="form-group">
                    <label for="gallery_stock">Stok</label>
                    <input class="form-control" type="text" name="gallery_stock" value="{{  $item->gallery_stock }}">
                </div>

                <div class="form-group">
                    <label for="gallery_price">Harga</label>
                    <input class="form-control" type="number" name="gallery_price" value="{{  $item->gallery_price}}">
                </div>

                <div class="form-group">
                    <label for="gallery_description">Deskripsi</label>
                    <textarea name="gallery_description"  rows="10" class="d-block w-100 form-control" value='{{  $item->gallery_description}}'></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
                
            </form>

        </div>
    </div>
    
@endsection