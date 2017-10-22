<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user){
            error_log("this is admin=".$user->role);
            error_log("user_role=".$user->role);
            return $user->role == 'admin';
        });

        Gate::define('operator', function($user){
            return $user->role == 'operator';
        });

        Gate::define('user', function($user){
            return $user->role == 'user';
        });

        //
    }
}
