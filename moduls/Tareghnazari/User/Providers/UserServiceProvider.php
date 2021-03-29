<?php


namespace Tareghnazari\User\Providers;


use Illuminate\Support\ServiceProvider;
use Tareghnazari\User\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public function boot()

    {

         $this->loadRoutesFrom(__DIR__.'/../Routes/user_routes.php');
         $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
         $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
         $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
    }

    public function register()
    {
        config()->set('auth.providers.users.model',User::class);
        //dd(config()->get('auth.providers.users.model'));
    }

}
