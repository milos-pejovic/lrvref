@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h1>{{$author->first_name}} {{$author->last_name}}</h1>
        <p>{{$author->about}}</p>

        <h2>Books</h2>

        <hr />

        @if(count($author->books) > 0)
            @foreach($author->books as $book)
                <div class="well">
                    <h4>{{$book->title}}</h4>    
                    <p>{{$book->about}}</p>
                </div>
            @endforeach
        @else 
            <p>No books by this author.</p>
        @endif

        <hr />

        <form method="POST" action="/authors/{{$author->id}}/book">
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add the Book</button>
            </div>

            @include('layouts.errors')
        </form>

        <p>
            <a class="btn btn-primary" href="/authors">Back to Author list</a>
        </p>
    </div>

@endsection