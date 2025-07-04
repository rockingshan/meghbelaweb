<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Define your policies here
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        // Define the access-admin gate
        Gate::define('access-admin', function ($user) {
            return $user && method_exists($user, 'hasRole') && $user->hasRole('admin');
        });
    }
}