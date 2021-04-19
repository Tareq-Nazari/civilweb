<?php

namespace Tareghnazari\Course\Repositories;


use Tareghnazari\Course\Models\Course;
use Illuminate\Support\Str;
use Tareghnazari\Media\Models\Media;
use Tareghnazari\Media\Services\MediaFileService;

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

    public function  findById($id)
    {
        return Course::find($id);

    }

    public function update( $id , $values)
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
        return Course::where('id', $id)->update(['confirmation_status'=> $status]);
    }

    public function updateStatus($id, $status)
    {
        return Course::where('id', $id)->update(['status'=> $status]);
    }

    public function getCoursesByTeacherId($id)
    {
        return Course::where('teacher_id' , $id)->get();
    }


}
