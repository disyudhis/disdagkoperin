<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;
                switch ($role) {
                    case 'ADMIN':
                        return redirect(route('admin.berita'));
                        break;
                    case 'CLIENT':
                        return redirect(route('home'));
                        break;
                    default:
                        return Session::get('previous', url('/'));
                        break;
                }
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
