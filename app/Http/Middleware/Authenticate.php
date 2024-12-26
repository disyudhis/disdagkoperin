<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $user = Auth::user();
        if ($user) {
            return $request->expectsJson() ? null : ($user->role == User::ROLE_ADMIN ? route('login') : route('loginWub'));
        }
        return route('loginWub');
    }
}
