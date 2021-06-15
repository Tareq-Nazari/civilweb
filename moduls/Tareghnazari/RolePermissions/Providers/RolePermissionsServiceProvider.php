<?php
namespace Tareghnazari\RolePermissions\Providers;

use Illuminate\Support\ServiceProvider;
use Tareghnazari\RolePermissions\Models\Permission;
use Tareghnazari\RolePermissions\Models\Role;
use Tareghnazari\RolePermissions\Policies\RolePermissionPolicy;

class RolePermissionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','RoleViews');
        $this->loadRoutesFrom(__DIR__.'/../Routes/role_permissions_routes.php');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Resources/Lang');
            \Gate::before(function ($user){
                if ($user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN)) {
                    return true;
                }else return null;
            });
        \Gate::policy(Role::class,RolePermissionPolicy::class);


    }

    public function boot()
    {
        config()->set('sidebar.items.role-permissions',[
            'icon' => 'i-role-permissions',
            'title' => 'نقش های کاربری',
            'url' => route('role-permissions.index')
        ]);
    }

}
