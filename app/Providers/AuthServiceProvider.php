<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRole(['admin']);
        });

        Gate::define('learn', function ($user) {
            return $user->hasAnyRole(['apprenant','admin']);
        });

        Gate::define('edit-user', function ($user) {
            return $user->hasAnyRole([ 'admin']); //elle autorise l'accès aux admins et aux auteurs
        });

        Gate::define('delete', function ($user) {
            return $user->isAdmin();
        });
    }
}
