<?php

namespace Tareghnazari\Course\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Tareghnazari\Course\Models\Course;
use Tareghnazari\Course\Repositories\CourseRepo;

class RegisterUserInCourse
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
        if ($event->payment->paymentable_type == Course::class) {
            resolve(CourseRepo::class)
                ->registerStudentToCourse($event->payment->buyer_id,$event->payment->paymentable_id);
        }
    }
}
