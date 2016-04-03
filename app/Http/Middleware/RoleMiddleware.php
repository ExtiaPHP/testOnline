<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class RoleMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if ($request->user() == null || $request->user()->role !== $role) {
            return Redirect::route('auth')->with('status', 'Bad account');
        }

        return $next($request);
    }

}