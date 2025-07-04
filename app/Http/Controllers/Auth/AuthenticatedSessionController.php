<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        try {
            if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
                Log::info('Login success: Admin user, redirecting to admin.index', ['user_id' => $user->id]);
                return redirect()->route('admin.index');
            }
            Log::info('Login success: Non-admin user, redirecting to home', ['user_id' => $user ? $user->id : null]);
            return redirect()->intended(route('home'));
        } catch (\Illuminate\Routing\Exceptions\InvalidRouteException $e) {
            Log::error('Login redirect failed: Route admin.index not defined', ['user_id' => $user ? $user->id : null]);
            return redirect()->route('home');
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}