<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, mixed ...$roles): Response
    {
        if (!in_array(Auth::user()->rule->rule, $roles)) {
            abort(404, 'ببوورە ڕیگەپێدراو نیت بۆ ئەم بەشە');
        }
        return $next($request);
    }
}
