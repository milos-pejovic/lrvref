<?php

namespace App\Http\Requests;

use App\User;
use App\mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|min:2',
          'email' => 'required|email',
          'password' => 'required|confirmed'
        ];
    }

    /**
     * 
     */
    public function persist() {
        // These two are identical:
        // request(['name', 'email', 'password']);
        // request()->only(['name', 'email', 'password']);

        // Create user
        $user = User::create(
            $this->only(['name', 'email', 'password'])
        );

        // Login user
        auth()->login($user);

        // Send welcome mail
        \Mail::to($user)->send(new Welcome($user));  
    }

}
