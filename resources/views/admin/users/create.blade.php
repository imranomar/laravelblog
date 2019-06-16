@extends('layouts.adminmaster')

@section('content')
    <h1>Create Users</h1>

    <br>
    @include('includes/form_errors')

    {!! Form::open(['method'=>'Post','action'=>'AdminUsersController@store','files'=>true]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('name'))
            <div class="alert alert-danger">{{$errors->first('Name')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div>
        @endif

        <div class="form-group">
            {!! Form::label('image','Image') !!}
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>

        @if($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div>
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop


