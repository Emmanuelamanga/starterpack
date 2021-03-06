<?php

namespace App\Http\Middleware;


use Closure;

class IsAdmin
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
        // check auth user if admin 
        if (auth()->user()->is_admin == 1) {

            return $next($request);
        }
        // for false redirect home with an error message 
        return redirect('home')->with('error', "You don\'t have admin access.");
    }
}
