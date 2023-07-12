<?php

namespace App\Providers;

use App\Models\Karmand;
use App\Models\Sarparshtyar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

        $rolesPermission = ['superadmin','admin','user'];
        // foreach ($rolesPermission as $permission) {
        //     Gate::define($permission, function (User $user) use ($permission) {
        //         return dd($user->rule->rule === $permission);
        //     });


        Gate::define('superadmin', function (User $user) {
            return $user->rule->rule === 'superadmin' && $user->rule_id === 1;
        });
        Gate::define('sarparshtyar', function (User $user) {
            return $user->rule->rule === 'admin' && $user->rule_id === 2;
        });

        Gate::define('user', function (User $user) {
            $karmandkan = Karmand::with('sarparshtyar', 'user')->whereHas('sarparshtyar', function (Builder $query) {
                $query->whereIn('user_id', [ Auth::id()]);
            })->orWhere('user_id', Auth::id())->pluck('user_id')->toArray();
            return  $user->rule->rule === 'user' && in_array($user->id, $karmandkan);
        });


        App::setLocale('ku');
        //
    }
}
