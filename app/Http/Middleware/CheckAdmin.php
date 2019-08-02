<?php


namespace App\Http\Middleware;

use Auth;
use Closure;
use Redirect;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->IsAdmin()) {
            return $next($request);
        } else {
            return redirect('table');
        }
    }
}