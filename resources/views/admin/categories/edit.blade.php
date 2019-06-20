@extends('layouts.adminmaster')
@section('content')
    <h1>Edit Category Page</h1>

    @include('includes/form_errors')

    {!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id],'files'=>false]) !!}
    {{ csrf_field() }}

    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    @if($errors->has('title'))
        <div class="alert alert-danger">{{$errors->first('title')}}</div>
    @endif

    {!! Form::submit('Update Category',['class'=>'btn btn-primary pull-left']) !!}

    {{ Form::close() }}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id],'class'=>'pull-right']) !!}
    {{ csrf_field() }}
    <div class="form-group">
        {!! Form::submit('Delete Category',['class'=>'btn btn-danger']) !!}
    </div>
    {{ Form::close() }}


@stop