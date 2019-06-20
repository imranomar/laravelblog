@extends('layouts.adminmaster')

@section('content')
    <h1>Edit Users</h1>

    <br>
    @if($user->photo)
    <div class="col-sm-3">
        <img src="{{$user->photos->file}}" class="img-responsive img-rounded">
    </div>
    @endif
    <div class="col-sm-9">

        @include('includes/form_errors')

        {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('name'))
            <div class="alert alert-danger">{{$errors->first('name')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('photo','Image') !!}
            {!! Form::file('photo',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('photo'))
            <div class="alert alert-danger">{{$errors->first('photo')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('role_id','Role Id') !!}
            {!! Form::select('role_id',array(''=>'Select a Role') + $roles,null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('role_id'))
            <div class="alert alert-danger">{{$errors->first('role_id')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active', array(1=>'Active',0=>'Not Active'), null, ['class'=>'form-control']) !!}
        </div>

        @if($errors->has('is_active'))
            <div class="alert alert-danger">{{$errors->first('is_active')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        @if($errors->has('password'))
            <div class="alert alert-danger">{{$errors->first('password')}}</div>
        @endif

        <button type="submit" class="btn btn-primary pull-left">Submit</button>
        {{ Form::close() }}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'class'=>'pull-right']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
            </div>
        {{ Form::close() }}


    </div>

@stop
