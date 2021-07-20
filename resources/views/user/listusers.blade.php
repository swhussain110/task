@extends('layout')
@section('title')
    Users List
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <td>User Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @can('edit user')
                    <a href="{{ route('edituser') . '/' . $user->id }}">Edit</a>
                   
                    @endcan
                    @can('delete user')
                    | <a href="{{ route('deleteuser') . '/' . $user->id }}">Delete</a>
                    @endcan
                    
                </td>
            </tr>
        @endforeach
        <tbody>

        </tbody>
    </table>
@endsection
