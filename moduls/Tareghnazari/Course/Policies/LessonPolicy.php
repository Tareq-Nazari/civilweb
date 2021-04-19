<?php

namespace Tareghnazari\Course\Policies;

use Tareghnazari\Course\Models\Course;
use Tareghnazari\Course\Models\Lesson;
use Tareghnazari\RolePermissions\Models\Permission;
use Tareghnazari\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create($user , $course){
        return $user->hasPermissionTo(Permission::PERMISSION_MANAGE_COURSES) || $course->teacher_id == $user->id;
    }

    public function destroy($user , $lesson)
    {
        return $user->hasPermissionTo(Permission::PERMISSION_MANAGE_COURSES) ||
            $lesson->course->teacher_id == $user->id;
    }


}
