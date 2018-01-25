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

        foreach ($request->user()->roles as $role) {
            if ($role->name === $roleName) {
                return $next($request);
            }
        }

        return redirect(route('login'));
    }
}
