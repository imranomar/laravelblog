@extends('layouts.adminmaster')

@section('content')
    <h1>Posts Edit Page</h1>

    @include('includes/form_errors')

    {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
    {{ csrf_field() }}


    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    @if($errors->has('title'))
        <div class="alert alert-danger">{{$errors->first('title')}}</div>
    @endif


    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',array(''=>'Select a Category') + $categories, null, ['class'=>'form-control']) !!}
    </div>

    @if($errors->has('category_id'))
        <div class="alert alert-danger">{{$errors->first('category_id')}}</div>
    @endif

    @if($post->photo)
        <img height="70" src='{{$post->photo->file ?  $post->photo->file   : "No Photo"}}'/>
    @endif

    <div class="form-group">
        {!! Form::label('photo','Photo') !!}
        {!! Form::file('photo', ['class'=>'form-control']) !!}
    </div>



    @if($errors->has('photo'))
        <div class="alert alert-danger">{{$errors->first('photo')}}</div>
    @endif

    <div class="form-group">
        {!! Form::label('body','Description') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

    @if($errors->has('body'))
        <div class="alert alert-danger">{{$errors->first('body')}}</div>
    @endif

    <button type="submit" class=" pull-left btn btn-primary">Submit</button>

    {{ Form::close() }}



    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'class'=>'pull-right']) !!}
    {{ csrf_field() }}
    <div class="form-group">
        {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
    </div>
    {{ Form::close() }}
@stop