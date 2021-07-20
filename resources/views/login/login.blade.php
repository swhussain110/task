@extends('layout')
@section('title')
Login - TinyCMS
@endsection
@section('content')
<div class="card mt-3">
    <div class="card-header text-white bg-dark text-center">
        Login
    </div>
    <div class="card-body">
        <form action="{{route('loginpost')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
            </div>
            <input id="login-btn" type="submit" value="Login" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection