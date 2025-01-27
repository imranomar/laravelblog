@extends('layouts.adminmaster');

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@stop

@section('content')
<h1>Media Uploads</h1>

{!! Form::open(['method'=>'POST','action'=>['AdminMediaController@store'], 'class'=>'dropzone']) !!}

{!! Form::close() !!}

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@stop