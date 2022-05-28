@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    <section class="user-profile">
        <form method="POST" action="{{ route('users.update',$user->id) }}">
            @csrf
            @method("PUT")

            <div class="row mb-3 justify-content-start">
                
                <div class="col-md-10">
                    <label for="name" >{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" readonly>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-start">
                
                <div class="col-md-10">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" readonly>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-start">
                
                <div class="col-md-10">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" readonly>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3 justify-content-start">
                
                <div class="col-md-10">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" readonly>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-start">
                
                <div class="col-md-10">
                    <label for="address">{{ __('Address') }}</label>
                    <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" readonly rows="3">{{ $user->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button id="editButton" type="button" class="btn btn-primary">
                {{ __('Ubah') }}
            </button>
            <button id="saveButton" style="display: none" class="btn btn-primary">
                {{ __('Simpan') }}
            </button>
            <a id="cancelButton" type="button" style="display: none" class="btn btn-danger">
                {{ __('Batal') }}
            </a>
            <a href="{{ route("home") }}" id="cancelHomeButton" type="button"   class="btn btn-danger">
                {{ __('Batal') }}
            </a>
        </form>
        
        

    </section>


    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 KAYUKAYUKU</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Our Product</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer>
    </div>
@endsection

@push('after-script')
    <script>
        $("#saveButton").hide();
        $(document).ready(function(){
            $("#editButton").click(function(){
                $("input").attr("readonly",false);
                $("textarea").attr("readonly",false);
                $("#editButton").hide();
                $("#saveButton").show();
                $("#cancelButton").show();
                $("#cancelHomeButton").hide();


            });

            $("#cancelButton").click(function(){
                $("input").attr("readonly",true);
                $("textarea").attr("readonly",true);
                $("#editButton").show();
                $("#saveButton").hide();
                $("#cancelButton").hide();
                $("#cancelHomeButton").show();

                
            });

            $("#saveButton").click(function() {
                $(this).parents("form:first").submit();
                $("input").attr("readonly",true);
                $("textarea").attr("readonly",true);
                $("#editButton").show();
                $("#saveButton").hide();
                
            });
        });

    </script>
@endpush

