@extends('layout')
@section('title')
    All Users
@endsection
@section('content')
    <div class="container">
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles[0]->name }}</td>
                        @can('edit user')
                        <td><a href="{{route('editrole').'/'.$user->id}}">Edit Role</a></td>
                            
                        @endcan
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection
