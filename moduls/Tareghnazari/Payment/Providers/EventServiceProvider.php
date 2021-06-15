<?php


namespace Tareghnazari\Payment\Providers;


use App\Providers\EventServiceProvider as ServiceProvider;
use Tareghnazari\Payment\Event\PaymentWasSuccessFull;
use Tareghnazari\Course\Listeners\RegisterUserInCourse;
use Tareghnazari\Payment\Listeners\IncreaseTeacherIdAccountBalance;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PaymentWasSuccessFull::class =>
            [
                RegisterUserInCourse::class,
                IncreaseTeacherIdAccountBalance::class,
            ]
    ];


    public function boot()
    {
        parent::boot();

        //
    }
}
