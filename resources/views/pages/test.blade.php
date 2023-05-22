@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center" style="height: 100vh">
    <div class="card" style="width: 18rem; height: 10rem;">
        <div class="card-body">
            <h5 class="card-title">Admin Account</h5>
            <p class="card-text">Email : Admin@test.com</p>
            <p class="card-text">Password : 1234asdf</p>
        </div>
    </div>
    <div class="card" style="width: 18rem; height: 10rem;">
        <div class="card-body">
            <h5 class="card-title">User Account</h5>
            <p class="card-text">Email : Customer@test.com</p>
            <p class="card-text">Password : 1234asdf</p>
        </div>
    </div>
</div>



@endsection
