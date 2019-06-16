@extends('layouts.adminmaster')

@section('content')
    <h1>Create Users</h1>

    <br>
    @include('includes/form_errors')

    {!! Form::open(['method'=>'Post','action'=>'AdminUsersController@store']) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role Id') !!}
            {!! Form::select('role_id',array(''=>'Select a Role') + $roles,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status','Status') !!}
            {!! Form::select('status', array(1=>'Active',0=>'Not Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop


