<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


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
        Gate::define('worker', function (User $user) {
            return $user->type == 2;
        });
        Gate::define('transporter', function (User $user) {
            return $user->type == 3;
        });
        Gate::define('employer', function (User $user) {
            return $user->type == 1;
        });
        Gate::define('employer_wor', function (User $user) {
            return (($user->type == 1) or ($user->type == 2));
        });
        Gate::define('employer_tra', function (User $user) {
            return (($user->type == 3) or ($user->type == 1));
        });
        Gate::define('worker_tra', function (User $user) {
            return (($user->type == 3) or ($user->type == 2));
        });
        Gate::define('users', function (User $user) {
            return (($user->type == 3) or ($user->type == 2) or ($user->type == 3));
        });
        Gate::define('admin', function (User $user) {
            return (($user->isadmin == 1));
        });
    }
}
