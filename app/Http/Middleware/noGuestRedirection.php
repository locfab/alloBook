<?php

namespace App\Http\Middleware;

use Closure;

class noGuestRedirection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        dd($request);
        if (Auth::guard($guard)->guest())
            return $next($request);
        return redirect()->guest('login');

    }
}
