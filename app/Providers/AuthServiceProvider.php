<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (Schema::hasTable('Permission'))
        {
            foreach ($this->getPermission() as $permission)
            {
                Gate::define($permission->name ,function ($user) use ($permission) {
                    return  $user->hasRole($permission->roles);
                });
            }
        }

    }

    protected function getPermission()
    {
        return Permission::with('roles')->get();
    }
}
