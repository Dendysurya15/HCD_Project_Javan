<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$is_admin)
    {
        if (in_array($request->user()->is_admin, $is_admin)) {
            return $next($request);
        }
        return redirect()->back()->with(['midd_response' => 'Your Cant Access This Site']);
    }
}
