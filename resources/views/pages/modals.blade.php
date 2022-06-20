<!-- Modal Login-->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form class="form-floating" method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            
                            <div class="row mb-3 justify-content-center ">
                                <div class="d-flex justify-content-center">
                                    <h3>{{ __('MASUK') }}</h3>
                                </div>
                                
                                <div class="col-10">
                                    <label for="email" >{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email@example.com') }}" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-10">
                                    <label for="password" >{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
                                </button>
                            </div>

                            <div class="d-flex justify-content-center">
                                <p>Belum memiliki akun? Register sekarang </p>
                            </div>

                            <div class="d-flex justify-content-center">
                                
                                <button type="button" id="btn-no-akun" class="btn btn-primary px-4" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">
                                    {{ __('Daftar') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="modal fade logout-modal" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h5 class="text-center mt-3">Apakah anda yakin untuk keluar ?</h5>
            <div class="container-fluid mt-4">
                <div class="row justify-content-center ps-4 pe-4 ">
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-danger">
                                
                                    Oke
                                                        
                            </button>
                        </a>   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade login-modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3 justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <h3>{{ __('DAFTAR') }}</h3>
                                </div>
                                <div class="col-md-10">
                                    <label for="name" >{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" placeholder="{{ __('Email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="username">{{ __('Username') }}</label>
                                    <input id="username" placeholder="{{ __('Username') }}" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input id="phone" placeholder="{{ __('Phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="address">{{ __('Address') }}</label>
                                    <textarea id="address" placeholder="{{ __('Address') }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus rows="3"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                
                                <div class="col-md-10">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" placeholder="{{ __('Password Confirm') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="d-flex mx-5">
                                <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">
                                    {{ __('Batal') }}
                                </button>

                                <button type="submit" class="btn btn-primary mx-2">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Create Order -->
<div class="modal fade create-product-modal" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h1 class="h4 mb-0 text-gray-600">Pesan</h1>
                            </div>
                                <form class="gap-4" id="addProduct" action="{{ route('orders.store') }}" method="post">
                                    @csrf

                                    
                                    <input id="product-id" type="hidden" name="product_id" value="" required>
                                    <input id="cart-id" type="hidden" name="cart_id" value="" required>
                                    <input id="amount" type="hidden" name="amount" value="" required>
                                    @guest
                                    @else
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group mb-3">
                                            <label for="product_name">Nama Pelanggan</label>
                                            <input class="form-control" name="name" type="text" placeholder="Nama Pelanggan" value="" required>
                                        </div>
                                    @endguest

                                    <div class="form-group mb-3">
                                        <label for="product_name">Produk</label>
                                        <input id="productName" class="form-control" type="text" placeholder="Nama Pelanggan" value="" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product_stock">Alamat Pelanggan</label>
                                        <textarea name="address"  rows="4" class="d-block w-100 form-control" placeholder="Alamat Pelanggan" required></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="Nomor Telepon" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="note">Catatan</label>
                                        <textarea name="note"  rows="4" class="d-block w-100 form-control" placeholder="Catatan" required></textarea>
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

{{-- Modal Cancel Order --}}
<div class="modal fade create-product-modal" id="cancelOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h1 class="h4 mb-0 text-gray-600">Pesan</h1>
                            </div>
                                <form class="gap-4" id="addProduct" action="{{ route('orders.cancel') }}" method="post">
                                    @csrf

                                    <input id="order-id" type="hidden" name="order_id" value="">
                                    <div class="form-group mb-3">
                                        <label for="reason">Alasan Pembatalan</label>
                                        <select class="form-select" name="reason" aria-label="Default select example" required>
                                            <option >Alasan Pembatalan</option>
                                            <option value="Barang Salah">Barang Salah</option>
                                            <option value="Alamat Salah">Alamat Salah</option>
                                            <option value="Jumlah Salah">Jumlah Salah</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-block mt-3" data-bs-dismiss="modal">Kembali</button>
                                    <button id="simpanProduct" type="submit" class="btn btn-primary btn-block mt-3">
                                        Batalkan Pesanan
                                    </button>
                                    
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>