<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        if (Session::has('id_account') != null) {

            return response($next($request));
        } else {
            return response(redirect()->route('getLogin'));
        }
    }
}