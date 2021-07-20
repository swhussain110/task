@extends('layout')
@section('title')
Edit User
@endsection
@section('content')
<div class="card mt-3">
    <div class="card-header text-white bg-dark text-center">
        Add User
    </div>
    <div class="card-body">
        @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('message')}}
          </div>
        @endif
        <form>
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                <input type="hidden" value="{{$user->id}}" name="id" id="id">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <input id="edit-btn" type="button" value="Update User" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#edit-btn').click(function (e) { 
        e.preventDefault();
        data = {
            id: $('#id').val(),
            name: $("#name").val(),
            email: $("#email").val(),
            _token: $('input[name=_token]').val()
        }
        console.log(data);
        $.post("{{route('updateuser')}}", data,
            function (response) {
                if(response.status == 200){
                    alert(response.message);
                }
            },
        );
        
    });
</script>
@endsection