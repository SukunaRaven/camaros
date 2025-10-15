<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Je hebt geen toegang tot dit onderdeel.');
        }
        return $next($request);
    }

}
