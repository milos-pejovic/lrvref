<?php

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

// Posts

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
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

