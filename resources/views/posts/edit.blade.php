@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Update a Post</h1>

        <hr />

        <form method="POST" action="/posts/{{$post->id}}">

            {{method_field('PATCH')}}
            
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            @include('layouts.errors')

        </form>

    </div>
@endsection