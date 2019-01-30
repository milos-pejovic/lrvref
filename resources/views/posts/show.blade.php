@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{$post->title}}</h1>

        @if(count($post->tags))
            <ul>
                @foreach($post->tags as $tag)
                    <li><a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>   
        @endif

        <p>By {{$post->user->name}}</p>
        <p>{{$post->body}}</p>

        <hr />

        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans() }} : &nbsp;
                        </strong>
                        {{$comment->body}}
                        <br />
                        By: {{$comment->user->name}}
                    </li>
                @endforeach
            </ul>
        </div>

        <!--  Add a comment  -->

        <hr />

        @auth
        
          <div class="card">
              <div class="card-block">
                  <form action="/posts/{{$post->id}}/comments" method="POST">

                      {{ csrf_field() }}

                      <div class="form-group">
                          <textarea name="body" id="body" cols="10" rows="10" placeholder="Your comment here" class="form-control"></textarea>
                      </div>

                      <div calss="form-group">
                          <button type="submit" class="btn btn-primary">Add Comment</button>    
                      </div>  

                  </form>
                  @include('layouts.errors')
              </div>
          </div>
        
        @endauth

    </div>
@endsection