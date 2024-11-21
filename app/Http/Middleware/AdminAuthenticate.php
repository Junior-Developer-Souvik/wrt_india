<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        // Check if the user is authenticated with the 'admin' guard
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('admin.login'); // Redirect to admin login if not authenticated
        }

        return $next($request); // Allow access if authenticated
    }
}
