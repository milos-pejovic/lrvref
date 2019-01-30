<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Authorization will be applied only to "index" method
        // $this->middleware('auth', ['only' => 'index']);

        // Authorization will be applied to all methods EXCEPT "index" method
        // $this->middleware('auth', ['except' => 'index']);

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
