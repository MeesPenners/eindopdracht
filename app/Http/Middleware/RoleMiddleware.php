<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role->name;

            if (in_array($userRole, $roles)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
