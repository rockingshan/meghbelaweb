<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                try {
                    if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
                        Log::info('RedirectIfAuthenticated: Admin user, redirecting to admin.index', ['user_id' => $user->id]);
                        return redirect()->route('admin.index');
                    }
                    Log::info('RedirectIfAuthenticated: Non-admin user, redirecting to home', ['user_id' => $user ? $user->id : null]);
                    return redirect()->route('home');
                } catch (\Illuminate\Routing\Exceptions\InvalidRouteException $e) {
                    Log::error('RedirectIfAuthenticated: Route admin.index not defined', ['user_id' => $user ? $user->id : null]);
                    return redirect()->route('home');
                }
            }
        }

        return $next($request);
    }
}