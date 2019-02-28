<?php

use SKAgarwal\GoogleApi\PlacesApi;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorCollection;
use App\Author;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/tt', function() {
//    return AuthorResource::collection(Author::all());
//    return new AuthorResource(Author::first());
    return new AuthorCollection(Author::all());
//    return new AuthorCollection(Author::paginate());
});

// This way we get a new/separate instance of this every time we resolve it.
app()->bind('example', function() {
    return new \App\Example(5);
});

// This way we always get the same instance of this every time we resolve it.
app()->singleton('example', function() {
    return new \App\Example;
});

// Every time we call "\App\Services\Twitter" we get the same instance with the passed API key.
app()->singleton('\App\Services\Twitter', function() {
    return new \App\Services\Twitter('My-API-Key-23432oids9034209328');
});

app()->bind('App\Example', function(){
    return new \App\Example(7);
});

Route::get('/a', function() {
//    dd(app('App\Example'));
    // This will work as well, even if we have not bound anything into the service container.
});

//app();
//resolve();

// Posts

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts/tags/{tag}', 'TagsController@index');

// Tasks

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

// Authors

Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/create', 'AuthorsController@create');
Route::get('/authors/{author}', 'AuthorsController@show');
Route::post('/authors/store', 'AuthorsController@store');
Route::post('/authors/{author}/book', 'BooksController@store');

//Route::resource('authors', 'AuthorsController', ['only' => ['index', 'show']]);

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/register', 'RegistrationController@create');
// Route::post('/register', 'RegistrationController@store');

// Route::get('/login', 'SessionsController@create');
// Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@store')->name('login');
Route::get('/logout', 'LoginController@logout');


// $stripe = App::make('\App\Billing\Stripe');

// dd(resolve('App\Billing\Stripe'));

Route::middleware('mw1:Peter,Sam')->group(function() {
    Route::get('test', function() {
        echo 'Test Middleware';
    });
});

Route::get('/gp', function() {
    $googlePlaces = app('GooglePlaces');
//    $googlePlaces = new PlacesApi(env('GOOGLE_PLACES_API_KEY'));

      $response = $googlePlaces->placeAutocomplete('toronto');
    
//    $data = $googlePlaces->placeAutocomplete('tor');
//    $response   = ['success' => true, 'data' => $data];
//    dd(response()->json($response, 200));
      
      error_log(print_r($response, 1));
      
//    dd($response);
});

Route::get('/gpd', function() {
    $googlePlaces = app('GooglePlaces');
    $response = $googlePlaces->placeDetails('ChIJpTvG15DL1IkRd8S0KlBVNTI');
    
    //dd($response);
});

// Gates

Route::get('/gate', function() {
    
//    Gate::before(function ($user, $ability) {
//        if ($user->isSuperAdmin()) {
//            return true;
//        }
//    });
    
    //Gate::forUser($user)->allows('test');
    
    if (Gate::allows('test-gate')) {
        echo 'Passed the gate';
    } else {
        echo 'Did not pass the gate';
    }
    
});
