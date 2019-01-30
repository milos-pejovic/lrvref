<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BooksController extends Controller
{
    /**
     * 
     */
    public function store(Author $author) {
        $this->validate(request(), [
            'title' => 'required|min:1',
            'about' => 'required|min:5',
        ]);

        $author->addBook(request(['title', 'about']));

        return back();
    }
}
