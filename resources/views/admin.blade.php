@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Posts count</th>
                <th scope="col">Active</th>
                <th scope="col">Deactivate</th>
                <th scope="col">Activate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->posts->count()}}</td>
                    <td>
                        @if($user->is_active)
                            <p class="text-success">Active</p>
                        @else
                            <p class="text-danger">Not active</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{asset('admin/inactive/' . $user->id)}}" class="btn btn-danger">Deactivate</a>
                    </td>
                    <td>
                        <a href="{{asset('admin/active/' . $user->id)}}" class="btn btn-success">Activate</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection