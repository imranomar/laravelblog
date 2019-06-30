@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by {{$post->user->name}}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file ? $post->photo->file : $post->photoPlaceHolder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">


        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST','action'=>['PostCommentController@store'],'files'=>false]) !!}
        {{ csrf_field() }}
        <input type="hidden" value="{{$post->id}}" name="post_id">


        <div class="form-group">

            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('body'))
            <div class="alert alert-danger">{{$errors->first('body')}}</div>
        @endif

        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

        {{ Form::close() }}


    </div>

    <hr>
@endif

    <!-- Posted Comments -->
@if(count($comments)>0)
    <!-- Comment -->
    @foreach($comments as $comment)

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$comment->post->user->gravatar}}" width="64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}


                @if(count($comment->replies)>0)
                @foreach($comment->replies as $reply)
                <!-- Nested Comment -->
                    <div class="media nested-comment">
                        <a class="pull-left" href="#">
                            <img class="media-object" width="54" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                    </div>

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply col-sm-10">
                    {!! Form::open(['method'=>'POST','action'=>['CommentRepliesController@createReply'],'files'=>false]) !!}
                    {{ csrf_field() }}


                        <input type="hidden" value="{{$comment->id}}" name="comment_id">
                        <div class="form-group">
                            {!! Form::label('body','Body') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                        </div>

                        @if($errors->has('body'))
                            <div class="alert alert-danger">{{$errors->first('body')}}</div>
                        @endif

                        {!! Form::submit('Create Reply',['class'=>'btn btn-info']) !!}

                    {{ Form::close() }}
                <!-- End Nested Comment -->
                        </div>
                    </div>
                @endforeach
                @endif

            </div>
        </div>
    @endforeach
@endif



@stop

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@stop