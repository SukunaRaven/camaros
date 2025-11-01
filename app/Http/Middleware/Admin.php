<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        //Is user admin?
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            //If no, show the error.
            abort(403, 'Unauthorized');
        }

        //If user is admin, user can go to admin page
        return $next($request);
    }
}
