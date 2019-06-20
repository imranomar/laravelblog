@extends('layouts.adminmaster')
@section('content')
    <h1>Create Category Page</h1>

    @include('includes/form_errors')

    {!! Form::open(['method'=>'POST','action'=>['AdminCategoriesController@store'],'files'=>false]) !!}
    {{ csrf_field() }}

    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    @if($errors->has('title'))
        <div class="alert alert-danger">{{$errors->first('title')}}</div>
    @endif

    {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
    {{ Form::close() }}
@stop