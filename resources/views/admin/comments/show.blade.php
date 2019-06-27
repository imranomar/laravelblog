@extends('layouts.adminmaster')
@section('content')
    <h1>Comments</h1>

    @if(count($comments)>0)

        <table class="table">
            <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Photo</th>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td></td>
                    <td>{{$comment->body}}</td></td>
                    <td><img src="{{$comment->photo}}"></td></td>
                    <td><a href="{{route('home.post',$comment->post_id)}}"> {{$comment->post_id}}  </a> </td></td>
                    <td>
                        @if($comment->is_active==1)
                            {!! Form::model($comment, ['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id],'files'=>false]) !!}
                            {{ csrf_field() }}

                            <input type="hidden" value=0 name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
                            </div>


                            {{ Form::close() }}
                        @else
                            {!! Form::model($comment, ['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id],'files'=>false]) !!}
                            {{ csrf_field() }}

                            <input type="hidden" value=1 name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>


                            {{ Form::close() }}
                        @endif
                    </td>
                    <td>
                        {!! Form::model($comment, ['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id],'files'=>false]) !!}
                        {{ csrf_field() }}

                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop
