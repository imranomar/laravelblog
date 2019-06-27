@extends('layouts.blog-home')

@section('content')
    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">
            @if($posts)

                @foreach($posts as $post)
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#">{{$post->title}}</a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php">{{$post->user->name}}</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                    <hr>
                    <img class="img-responsive" src="{{$post->Photo->file}}" alt="">
                    <hr>
                    <p>{{ str_limit($post->body,200) }}</p>
                    <a class="btn btn-primary" href="post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                @endforeach
            <!-- Pagination -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                    {{$posts->render()}}
                        </div>
                    </div>

            @endif
        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes.front_side_bar')

    </div>
    <!-- /.row -->

@endsection
