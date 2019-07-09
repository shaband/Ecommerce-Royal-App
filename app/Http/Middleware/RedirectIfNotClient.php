<?php

namespace App\Http\Middleware;

use Closure;

use Auth ; 

class RedirectIfNotClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'client')
    {

        if (!Auth::guard($guard)->check()) {

            return redirect('/client/login');

        }

        return $next($request);
    }
       
}
