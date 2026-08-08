<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || $request->user()->email !== 'admin@urbanhaus.studio') {
            return redirect()->route('prendas.index')->with('error', 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
