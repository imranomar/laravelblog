@extends('layouts.adminmaster');
@section('content');
    <h1>Media Index Page</h1>

    <table class="table">
        <thead>
        <th>Id</th>
        <th>Photo</th>
        <th>Created On</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td> <img class="img-responsive" src="{{$photo->file}}"> </td>
                    <td>{{$photo->created_at}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id],'files'=>false]) !!}
                        {{ csrf_field() }}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop