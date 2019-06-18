@extends('layouts.adminmaster')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <strong>{{ session('flash_message') }}</strong>
        </div>
    @endif

    <h1>Users</h1>
    <table class='table'>
        <tr>
            <th>Photo</th>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
        </tr>
        @if($users)
            @foreach($users as $user)
            <tr>
                <td>
                    @if($user->photo)
                        <img height="70" src='{{$user->photos ?   $user->photos->file    : "No Photo"}}'/>
                    @endif
                </td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active ? 'Yes' : 'No'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('users.edit',$user->id)}}">Edit</a></td>
            </tr>
            @endforeach
        @endif
      
    </table>
@stop