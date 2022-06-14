<!-- Modal Create Produk -->
<div class="modal fade create-product-modal" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <div class="container-fluid mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h4 mb-0 text-gray-600">Tambah Data Produk</h1>
                            </div>
                                <form id="addProduct" action="{{ route('products.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="product_name">Nama Produk</label>
                                        <input class="form-control" type="text" name="product_name" placeholder="Nama Produk" value="{{ old('product_name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_stock">Stok</label>
                                        <input class="form-control" type="text" name="product_stock" placeholder="Stok" value="{{ old('product_stock') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_price">Harga</label>
                                        <input class="form-control" type="number" name="product_price" placeholder="Harga" value="{{ old('product_price') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_description">Deskripsi</label>
                                        <textarea name="product_description"  rows="10" class="d-block w-100 form-control" placeholder="Deskripsi" value='{{ old('product_description') }}'></textarea>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Kembali</button>
                                    <button id="simpanProduct" type="submit" class="btn btn-primary btn-block mt-3">
                                        Simpan
                                    </button>
                                    
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- Modal konfirmasi create produk
<div class="modal fade add-confirm-modal" id="addConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h5 class="text-center mt-3">Apakah anda yakin menambahkan data baru ?</h5>
            <div class="container-fluid mt-4">
                <div class="row justify-content-center ps-4 pe-4 ">
                    <div class="col-auto">
                        <button id="backToAddBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-auto">
                        <button id="btnAddProduct" type="button" class="btn btn-danger" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</div> --}}

@if (! $items == null)
    <!-- Modal Edit Produk -->
    <div class="modal fade edit-product-modal" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body justify-content-center">
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center">

                        <div class="flex">
                            <h3>Edit Data</h3>
                        </div>
                        <div class="col-md-12">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('products.update',$item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                
                                <div class="form-group">
                                    <label for="product_name">Nama Produk</label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $item->product_name }}" placeholder="Nama Produk">
                                </div>
                
                                <div class="form-group" style="display:none;">
                                    <label for="product_stock">Stok</label>
                                    <input class="form-control" type="number" name="product_stock" value="{{  $item->product_stock }}" placeholder="Stok">
                                </div>
                
                                <div class="form-group">
                                    <label for="product_price">Harga</label>
                                    <input class="form-control" type="number" name="product_price" value="{{  $item->product_price}}" placeholder="Harga">
                                </div>
                
                                <div class="form-group">
                                    <label for="product_description">Deskripsi</label>
                                    <textarea name="product_description"  rows="10" class="d-block w-100 form-control" value='{{  $item->product_description}}' placeholder="Deskripsi"></textarea>
                                </div>
                
                                <button type="button" class="btn btn-danger btn-block" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Simpan
                                </button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endif

<!-- Modal Create Gallery -->
<div class="modal fade create-gallery-modal" id="createGalleryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <div class="container-fluid mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h4 mb-0 text-gray-600">Tambah Gambar</h1>
                            </div>
                                <form id="addGallery" action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="product_id">Nama Produk</label>
                                        <select name="product_id" class="form-control" id="product_id" required>
                                            <option id="selected-prev" value="" selected>Pilih Produk</option>
                                            
                                        </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar</label>
                                        <input class="form-control" id="image" type="file" name="image" placeholder="Images">
                                    </div>

                                    <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Batal</button>
                                    <button id="simpanGallery" type="button" class="btn btn-primary btn-block mt-3" data-bs-toggle="modal" data-bs-target="#addImageConfirmModal">
                                        Simpan
                                    </button>
                                    
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- Modal konfirmasi create produk --}}
<div class="modal fade add-image-confirm-modal" id="addImageConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h5 class="text-center mt-3">Apakah anda yakin menambahkan data baru ?</h5>
            <div class="container-fluid mt-4">
                <div class="row justify-content-center ps-4 pe-4 ">
                    <div class="col-auto">
                        <button id="backToAddBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-auto">
                        <button id="btnAddGallery" type="button" class="btn btn-danger" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@if ( ! $items == null)
    <!-- Modal Edit Produk -->
    <div class="modal fade edit-gallery-modal" id="editGalleryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body justify-content-center">
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center">

                        <div class="flex">
                            <h3>Edit Data</h3>
                        </div>
                        <div class="col-md-12">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('galleries.update',$item->id) }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                
                                <div class="form-group">
                                    <label for="product_id">Nama Produk</label>
                                    <select name="product_id" class="form-control" id="product_id" required>
                                        <option id="selected-prev" value="">Pilih Produk</option>
                                        @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{$item->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input class="form-control" id="image" type="file" name="image" placeholder="Images">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    Ubah
                                </button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endif


{{-- Modal Batch Action Stok --}}
@if($item != null)
<div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <div class="flex">
                <h3>Ubah Stok Barang</h3>
                <p>Masukkan jumlah stok yang ingin ditambahkan atau dikurangi</p>
            </div>

            <form action="{{ route('change-stock.batch',$item->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group" style="display: none">
                    <label for="product_name">Nama Produk</label>
                    <input class="form-control" type="text" name="product_name" placeholder="Nama Produk" value="{{ old('product_name') }}">
                </div>

                <div class="form-group">                    
                    <label for="product_stock">Perubahan Stok</label>
                    <input class="form-control" type="number" name="stockChange" placeholder="0" required>
                </div>
                <div class="form-text">
                    *Tambahkan (-) untuk mengurangi
                </div>
                <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-block mt-3">
                    Ubah
                </button>
            </form>
        </div>
    </div>
    </div>
</div>
@endif

