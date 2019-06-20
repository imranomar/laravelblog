@extends('layouts.adminmaster')

@section('content')
    <h1>Categories Page</h1>

    <table class="table">
        <thead>
        <th>Title</th>
        <th>Edit</th>
        </thead>
        <tbody>

        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td><a href="{{route('categories.edit',$category->id)}}">Edit</a> </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop