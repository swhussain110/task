@extends('layout')
@section('title')
    Waiting for Approval
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
                <td>User Id</td>
                <td>User Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('approve') . '/' . $user->id }}">
                            Approve
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
