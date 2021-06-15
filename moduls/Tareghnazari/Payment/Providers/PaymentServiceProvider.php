<?php

namespace Tareghnazari\Payment\Providers;

use Illuminate\Support\ServiceProvider;
use Tareghnazari\Payment\Gateways\Gateway;
use Tareghnazari\Payment\Gateways\Zarinpal\ZarinpalAdaptor;
use Tareghnazari\Payment\Models\Payment;
use Tareghnazari\Payment\Policies\PaymentPolicy;
use Tareghnazari\RolePermissions\Models\Permission;

class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/payment_routes.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/settlement_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Payment');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../Resources/Lang');
    }

    public function boot()
    {
//        \Gate::policy(Payment::class,PaymentPolicy::class);
        config()->set('sidebar.items.transactions', [
            "icon" => "i-transactions",
            "title" => "تراکنش ها",
            "url" => 'payments'
        ]);
        config()->set('sidebar.items.my-purchases', [
            "icon" => "i-my__purchases",
            "title" => "خریدهای من",
            "url" => '/mypurchases',
        ]);
        config()->set('sidebar.items.settlement-request', [
            "icon" => "i-checkout__request",
            "title" => "درخواست تسویه حساب",
            "url" => route('settlements.create'),
        ]);
        config()->set('sidebar.items.settlements', [
            "icon" => "i-checkouts",
            "title" => "تسویه حساب ها",
            "url" => route('settlements.index'),
        ]);
        $this->app->singleton(Gateway::class, function ($app) {
            return new ZarinpalAdaptor();
        });
    }
}
