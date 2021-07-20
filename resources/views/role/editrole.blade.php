@extends('layout')
@section('title')
    Edit Role
@endsection
@section('content')
    <div class="card mt-3">
        <div class="card-header text-white bg-dark text-center">
            Login
        </div>
        <div class="card-body">
            <form id="editrole">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">User Name:</label>
                    <input type="text" id="name" disabled class="form-control" value="{{ $user->name }}">
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                </div>
                <div class="form-group mb-3">
                    <select class="form-select" aria-label="Default select example" id="role" name="role">
                        @foreach ($roles as $role)
                            <option @if ($loop->first) selected @endif value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input id="btnsubmit" type="button" value="Assign Role" class="btn btn-primary">
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('#btnsubmit').click(function(e) {
            e.preventDefault();
            let userid = $('#id').val();
            let role = $('#role').val();
            let _token = $('input[name=_token]').val();
            console.log(userid);
            console.log(role);
            var data = {
                userid: userid,
                role: role,
                _token:_token
            }
            $.ajax({
                type: "POST",
                url: "{{ route('assignrole') }}",
                data: data,
                success: function(response) {
                    alert(response.message);
                }
            });
        });
    </script>
@endsection
