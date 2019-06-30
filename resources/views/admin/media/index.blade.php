@extends('layouts.adminmaster')
@section('content')
    <h1>Media Index Page</h1>


    @if($photos)
    <form action="/delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray2" class="form-control">
                <option value="Delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
        <table class="table">
            <thead>
                <th><input type="checkbox" id="options"> </th>
                <th>Id</th>
                <th>Photo</th>
                <th>Created On</th>
                <th>Delete</th>
            </thead>
            <tbody>

                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td> <img class="img-responsive" src="{{$photo->file}}"> </td>
                        <td>{{$photo->created_at}}</td>
                        <td>
{{--                            {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id],'files'=>false]) !!}--}}
{{--                            {{ csrf_field() }}--}}
{{--                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}--}}
{{--                            {{ Form::close() }}--}}

                            <input type="button" name="deleteSingle" value="Delete" class="deleteSingle btn btn-danger">
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </form>
    @endif
@stop

@section('scripts')
<script>

    $('.deleteSingle').click(function(){
        $(this).parent().parent().find('.checkBoxes').trigger('click');
        $('.form-inline').submit();
    });

    $('#options').click(function(){
        if(this.checked)
        {
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }
        else
        {
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });
</script>
@stop

