@extends('layouts.master')

@section('content')

    <div class="col-md-8">
        <h1>Login</h1>

        <form action="/login" method="POST">
            {{csrf_field()}}
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

        </form>
    </div>

@endsection