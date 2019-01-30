<?php

namespace App\Http\Middleware;

use Closure;

class mw1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name = null, $surname = null)
    {
        error_log('Firing MW1');
        error_log('NAME: ' . $name);
        error_log('SURNAME: ' . $surname);
        
        if ($request->ip() == '127.0.0.1') {
//            error_log('Home');
        } else {
//            error_log('NOT home');
        }
        
//        dd($request->ip());
        
        return $next($request);
    }
}
