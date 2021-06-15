<?php

namespace Tareghnazari\Course\Repositories;


use Tareghnazari\Course\Models\Course;
use Illuminate\Support\Str;
use Tareghnazari\Course\Models\CourseStudent;
use Tareghnazari\Course\Models\Lesson;
use Tareghnazari\Media\Models\Media;
use Tareghnazari\Media\Services\MediaFileService;
use Tareghnazari\User\Models\User;

class CourseRepo
{
    public function store($values)
    {
        return Course::create([
            'teacher_id' => $values->teacher_id,
            'category_id' => $values->category_id,
            'banner_id' => $values->banner_id,
            'title' => $values->title,
            'slug' => Str::slug($values->slug),
            'priority' => $values->priority,
            'price' => $values->price,
            'percent' => $values->percent,
            'type' => $values->type,
            'status' => $values->status,
            'body' => $values->body,
        ]);
    }

    public function paginate()
    {
        return Course::paginate();

    }

    public function delete($id)
    {
        $course = $this->findById($id);

        Media::find($course->banner_id)->delete();

        Course::find($id)->delete();


    }

    public function findById($id)
    {
        return Course::find($id)->withCount('student')->withCount('lessons');


    }

    public function update($id, $values)
    {
        return Course::where('id', $id)->update([
            'teacher_id' => $values->teacher_id,
            'category_id' => $values->category_id,
            'banner_id' => $values->banner_id,
            'title' => $values->title,
            'slug' => Str::slug($values->slug),
            'priority' => $values->priority,
            'price' => $values->price,
            'percent' => $values->percent,
            'type' => $values->type,
            'status' => $values->status,
            'body' => $values->body,
        ]);

    }

    public function updateConfirmationStatus($id, $status)
    {
        return Course::where('id', $id)->update(['confirmation_status' => $status]);
    }

    public function updateStatus($id, $status)
    {
        return Course::where('id', $id)->update(['status' => $status]);
    }

    public function getCoursesByTeacherId($id)
    {
        return Course::where('teacher_id', $id)->get();
    }

    public function getLatestCourses()
    {
        return Course::query()->orderBy('created_at', 'asc')->take(8)->get();
    }

    public function getPopularCourses()
    {
        $courses = Course::withCount('student')->orderByDesc('student_count')->take(8)->get();
        return $courses;
    }

    public function userHasRegistered($id, $course)
    {

        return \DB::table('course_student')
            ->where('course_id', $course->id)
            ->where('user_id', $id)
            ->select('id')
            ->get()->toArray();


    }

    public function registerStudentToCourse($studentId, $courseId)
    {

        $course = Course::find($courseId);
        $user = User::find($studentId);
        $course->student()->attach($user);


    }


}
