@extends('layouts.adminmaster')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <strong>{{ session('flash_message') }}</strong>
        </div>
    @endif

    <h1>Posts Index Page</h1>
    <table class="table">
        <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Photo Id</th>
        <th>Author</th>
        <th>Category Id</th>
        <th>View</th>
        <th>Comments</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a  href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>
                    @if($post->photo)
                        <img height="70" src='{{$post->photo->file ?   $post->photo->file   : "No Photo"}}'/>
                    @endif
                </td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->title}}</td>
                <td><a href="{{route('home.post',$post->slug)}}"> View </a> </td>
                <td><a href="{{route('comments.show',$post->id)}}"> Comments </a> </td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}">Edit</a></td>

            </tr>
            @endforeach
        @endif

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop

