<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dashboard-admin', function ($user){
            return $user->hasRole('super_admin');
        });

        Gate::define('dashboard-teacher', function ($user){
            return $user->hasRole('teacher');
        });

        Gate::define('dashboard-student', function ($user){
            return $user->hasRole('teacher');
        });

        Gate::define('teacher-status', function ($user){
            return $user->enseignant->status;
        });
    }
}
