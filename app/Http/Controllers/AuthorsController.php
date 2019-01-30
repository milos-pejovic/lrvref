<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;

class AuthorsController extends Controller
{
    
//    public function __construct() {
//        $this->middleware('test-middlewares');
//    }
    
    /**
     * 
     */
    public function index() {
        $authors = Author::all();
        return view('authors.index')->with('authors', $authors);
    }

    /**
     * 
     */
    public function show(Author $author) {
        return view('authors.show')->with('author', $author);
    }

    /**
     * 
     */
    public function create() {
        return view('authors.create');
    }

   /**
    * 
    */
    public function store() {
        $this->validate(request(), [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'about' => 'required|min:5'
        ]);

        Author::create(request(['first_name', 'last_name', 'about']));

        return redirect('/authors');
    }

}
