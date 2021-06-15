<?php

namespace Tareghnazari\Payment\Listeners;


use Tareghnazari\Course\Models\Course;
use Tareghnazari\Payment\Repositories\PaymentRepo;

class IncreaseTeacherIdAccountBalance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $course = Course::find($event->payment->paymentable_id);
        $teacher = $course->teacher;
        $teacher->balance += $event->payment->seller_share;
        $teacher->save();
        

    }
}
