<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('kepala', function(User $user){
            return $user->role === 'kepala';
        });
        Gate::define('subag', function(User $user){
            return $user->role === 'subag';
        });
        Gate::define('verifikator', function(User $user){
            return $user->role === 'verifikator';
        });
        Gate::define('analis', function(User $user){
            return $user->role === 'analis';
        });
    }
}
