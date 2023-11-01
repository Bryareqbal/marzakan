<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
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

        $rolesPermission = ['superadmin', 'admin', 'user'];
        // foreach ($rolesPermission as $permission) {
        //     Gate::define($permission, function (User $user) use ($permission) {
        //         return dd($user->rule->rule === $permission);
        //     });


        Gate::define('superadmin', function (User $user) {
            return $user->rule->rule === 'superadmin' && $user->rule_id === 1;
        });
        Gate::define('sarparshtyar', function (User $user) {
            return $user->rule->rule === 'sarparshtyar' && $user->rule_id === 2;
        });

        Gate::define('summary', function (User $user) {
            return $user->rule->rule === 'summary' && $user->rule_id === 4;
        });

        Gate::define('user', function (User $user) {
            return $user->rule->rule === 'karmand';
        });




        Paginator::defaultView('tailwind');

        App::setLocale('ku');

        //
    }
}
