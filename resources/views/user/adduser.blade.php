@extends('layout')
@section('title')
Add User
@endsection
@section('content')
<div class="card mt-3">
    <div class="card-header text-white bg-dark text-center">
        Add User
    </div>
    <div class="card-body">
        
        <form>
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control">
            </div>
            <input id="add-btn" type="button" value="Add User" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#add-btn').click(function (e) { 
            e.preventDefault();
            console.log('Clicked.');
            data = {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                _token: $('input[name=_token]').val(),
            }
            console.log(data);
            $.post("{{route('storeuser')}}", data,
                function (response) {
                    if(response.status == 200){
                        alert(response.message);
                    }
                },
            );
        });
    </script>
@endsection