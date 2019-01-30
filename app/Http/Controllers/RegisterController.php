<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{
  /**
   * 
   */
  public function create() {
    return view('register.create');
  }

  /**
   * 
   */
  public function store(RegistrationRequest $request) {

    // $request->persist();

    // Create user

    // dd(bcrypt(request('password')));

    $user = User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => bcrypt(request('password'))
    ]);

    // Login user

    auth()->login($user);

    \Mail::to($user)->send(new Welcome($user));   

    // Return

    return redirect('/');
  }
}
