@extends('layout')
@section('title')
    Register
@endsection
@section('content')
<div id="#errors"></div>
    <div class="card mt-3">
        <div class="card-header text-white bg-dark text-center">
            Register
        </div>
        @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('message')}}
          </div>
        @endif
        <div class="card-body">
            <form action="{{route('registeruserpost')}}" method="post">
                @csrf
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text"  name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text"  name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" name="name">Password:</label>
                <input type="password"  name="password" class="form-control" class="btn btn-primary">
            </div>
            <div class="form-group">
                <input id="btnregister" type="submit" value="Register" class="btn btn-primary my3">
                <input type="reset" value="Reset" class="btn btn-warning my-3">
            </div>
            </form>
        </div>
    </div>
@endsection
