@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <h2>Add an Author</h2>

        <form method="POST" action="/authors/store">
            {{csrf_field()}}

            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add the Author</button>
            </div>

            @include('layouts.errors')
        </form>

    </div>    

@endsection
