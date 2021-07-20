@extends('layout')
@section('title')
    Search User
@endsection
@section('content')
    <form method="get">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <input type="submit" value="Search" class="mt-2 btn btn-primary">
    </form>

    @if ($users)

        <table class="table">
            <thead>
                <tr>
                    <td>Name:</td>
                    <td>Email:</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
@endsection
