<?php

namespace Tareghnazari\Course\Http\Controllers;

use Tareghnazari\Course\Http\Requests\LessonRequest;
use Tareghnazari\Course\Http\Requests\SeasonRequest;
use Tareghnazari\Course\Models\Lesson;
use Tareghnazari\Course\Policies\CoursePolicy;
use Tareghnazari\Course\Repositories\CourseRepo;
use Tareghnazari\Course\Repositories\LessonRepo;
use Tareghnazari\Course\Repositories\SeasonRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tareghnazari\Media\Services\MediaFileService;

class LessonController extends Controller
{
    private $lessonRepo;

    public function __construct(LessonRepo $lessonRepo)
    {
        $this->lessonRepo = $lessonRepo;
    }
    public function create($courseId,SeasonRepo $seasonRepo,CourseRepo $courseRepo)
    {
        $course = $courseRepo->findById($courseId);
        $seasons = $seasonRepo->getCourseSeasons($course);
        return view('Courses::lessons.create',compact('seasons','course'));

    }

    public function store($courseId, LessonRequest $request, CourseRepo $courseRepo,LessonRepo $lessonRepo)
    {

        $request->request->add(["media_id" => MediaFileService::upload($request->file('lesson_file')) ]);
        $lessonRepo->store($courseId, $request);
        return redirect(route('courses.details', $courseId));
    }

    public function edit($courseId,$lessonId,LessonRepo $lessonRepo,CourseRepo $courseRepo, SeasonRepo $seasonRepo)
    {

        $lesson = $lessonRepo->findByid($lessonId);
        $course = $courseRepo->findById($courseId);
        $this->authorize('edit', $course);
        $seasons = $seasonRepo->getCourseSeasons($course);
        return view('Courses::lessons.edit',compact('course' , 'lesson','seasons'));

    }

    public function update($courseId, $lessonId, LessonRequest $request)
    {
        $lesson = $this->lessonRepo->findByid($lessonId);
        $course = $lesson->course;
        $this->authorize('create', $course);
        if ($request->hasFile('lesson_file')) {

            if ($lesson->media)
                $lesson->media->delete();

            $request->request->add(["media_id" => MediaFileService::upload($request->file('lesson_file')) ]);
        }else{
            $request->request->add(['media_id'=> $lesson->media_id]);
        }
        $this->lessonRepo->update($lessonId, $courseId, $request);

        return redirect(route('courses.details', $courseId));
    }

    public function destroy($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $this->authorize('destroy',$lesson);
       $lesson =  $this->lessonRepo->findByid($lessonId);
       $lesson->media->delete();


    }
}
