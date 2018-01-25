<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $roleName
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {
        if (!Auth::guard()->check()) {
            return redirect(route('login'));
        }

        if (count($request->user()->roles) <= 0) {
            abort(404, 'Couldn\'t find any roles');
        }

        if ($request->user()->hasRole($roleName)) {
            return $next($request);
        }

        return redirect(route('login'));
    }
}
