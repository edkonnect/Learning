<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AirlineManagerMiddleware
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
        if ($request->user() && $request->user()->roles != '3')
        {
            return new Response(view('401')->with('role', 'Airline Manager'));
        }
        return $next($request);
    }
}
