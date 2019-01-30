<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 
     */
    public function login() {
        return view('login.create');
    }

    /**
     * 
     */
    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt(request(['name', 'password']));

        return redirect('/');
    }

    /**
     * 
     */
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
