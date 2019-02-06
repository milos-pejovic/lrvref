@extends('layouts.master')

@section('content')

    <input id="places-search" /><br /><br />

    <div class="col-sm-8 blog-main">

        <h1>{{ trans('greetings.hello') }}</h1>

        @foreach($posts as $post)
           @include('posts.post')
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
@endsection  