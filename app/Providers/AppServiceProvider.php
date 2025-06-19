<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define a gate to check if the user is an admin
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'ADMIN';
        });

        // Define a gate to check if the user is a customer
        Gate::define('isCustomer', function (User $user) {
            return $user->role === 'CUSTOMER';
        });
        // Define a gate to check if the user is an owner
        Gate::define('isOwner', function (User $user) {
            return $user->role === 'OWNER';
        });
        Gate::define('payment_booking', function (User $user) {
            return $user->role === 'CUSTOMER' || $user->role === 'OWNER';
        });
        Gate::define('manage_fields', function (User $user) {
            return $user->role === 'ADMIN' || $user->role === 'OWNER';
        });
    }
}
