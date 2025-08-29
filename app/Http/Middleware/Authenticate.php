<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Redirect to your custom login page with the form=login parameter
        return '/login-register?form=login';

        // Alternative if you need to use route name:
        // return route('login-register', ['form' => 'login']);
    }
}
