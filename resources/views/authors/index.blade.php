@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h2>Authors</h2>
        @if(count($authors) > 0)
            <ul class="list-group">
                @foreach($authors as $author)
                    <li calss="list-group-item">
                        <a href="/authors/{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</a>
                    </li>    
                @endforeach
            </ul>
        @else
            <p>No authors found</p>
        @endif
    
        <p>
            <a href="/authors/create" class="btn btn-primary">Add an Author</a>
        </p>
    </div>

@endsection