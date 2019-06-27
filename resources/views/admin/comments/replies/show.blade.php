@extends('layouts.adminmaster')
@section('content')
    <h1>Replies</h1>

    @if(count($replies)>0)

        <table class="table">
            <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Photo</th>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td></td>
                    <td>{{$reply->body}}</td></td>
                    <td><img src="{{$reply->photo}}"></td></td>
                    <td><a href="{{route('home.post',$reply->comment->post_id)}}"> {{$reply->comment->post_id}}  </a> </td></td>
                    <td>
                        @if($reply->is_active==1)
                            {!! Form::model($reply, ['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id],'files'=>false]) !!}
                            {{ csrf_field() }}

                            <input type="hidden" value=0 name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
                            </div>


                            {{ Form::close() }}
                        @else
                            {!! Form::model($reply, ['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id],'files'=>false]) !!}
                            {{ csrf_field() }}

                            <input type="hidden" value=1 name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>


                            {{ Form::close() }}
                        @endif
                    </td>
                    <td>
                        {!! Form::model($reply, ['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id],'files'=>false]) !!}
                        {{ csrf_field() }}

                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <h1 class="text-center">No Replies</h1>
    @endif
@stop
