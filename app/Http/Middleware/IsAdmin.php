<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       if(auth()->user())
       {
        if(auth()->user()->role_id != '1')
        {
            return redirect()->route('ecommerce');
        }
       }
        return $next($request);

    }
}
