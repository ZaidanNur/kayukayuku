<!-- Modal Create Order -->
<div class="modal fade create-product-modal" id="orderAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h1 class="h4 mb-0 text-gray-600">Data Pesan</h1>
                            </div>
                                <form class="gap-4" id="addProduct" action="{{ route('order-admin.store') }}" method="post">
                                    @csrf 
                                    <input type="hidden" name="status" value="">
                                    @guest
                                    @else
                                        <div class="form-group mb-3">
                                            <label for="name">Nama Pelanggans</label>
                                            <input class="form-control" name="name" type="text" placeholder="Nama Pelanggan" value="">
                                        </div>
                                    @endguest

                                    <div class="mb-3">
                                        <label for="product_id">Produk</label>
                                        <select name="product_id" class="form-select" aria-label="Default select example">
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Jumlah</label>
                                        <input class="form-control" id="amount" type="number" name="amount" value="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product_stock">Alamat Pelanggan</label>
                                        <textarea name="address"  rows="4" class="d-block w-100 form-control" placeholder="Alamat Pelanggan"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="Nomor Telepon">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="note">Catatan</label>
                                        <textarea name="note"  rows="4" class="d-block w-100 form-control" placeholder="Catatan"></textarea>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Kembali</button>
                                    <button id="simpanProduct" type="submit" class="btn btn-primary btn-block mt-3">
                                        Pesan
                                    </button>
                                    
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Edit Order -->
<div class="modal fade create-product-modal" id="orderAdminEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h1 class="h4 mb-0 text-gray-600">Edit Data Pesan</h1>
                            </div>
                                <form class="gap-4" id="addProduct" action="{{ route('order-admin.order-edit',1) }}" method="post">
                                    @csrf

                                    @guest
                                    @else
                                        <div class="form-group mb-3">
                                            <label for="name">Nama Pelanggans</label>
                                            <input class="form-control" name="name" type="text" placeholder="Nama Pelanggan" value="">
                                        </div>
                                    @endguest

                                    <div class="mb-3">
                                        <label for="product_id">Produk</label>
                                        <select name="product_id" class="form-select" aria-label="Default select example">
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Jumlah</label>
                                        <input class="form-control" id="amount" type="number" name="amount" value="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product_stock">Alamat Pelanggan</label>
                                        <textarea name="address"  rows="4" class="d-block w-100 form-control" placeholder="Alamat Pelanggan"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="Nomor Telepon">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="note">Catatan</label>
                                        <textarea name="note"  rows="4" class="d-block w-100 form-control" placeholder="Catatan"></textarea>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Kembali</button>
                                    <button id="simpanProduct" type="submit" class="btn btn-primary btn-block mt-3">
                                        Pesan
                                    </button>
                                    
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>