<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::check())) {
            // User is not authenticated, redirect to the login page
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        // User is authenticated, allow the request to proceed
        return $next($request);
    }
}
