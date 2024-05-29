<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAllCoursesBySchool($schoolId)
    {
        return $this->courseRepository->getAllBySchool($schoolId);
    }

    public function createCourse(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images');
        }
        if (isset($data['promotional_video'])) {
            $data['promotional_video'] = $data['promotional_video']->store('videos');
        }
        return $this->courseRepository->create($data);
    }

    public function getCourseById($id)
    {
        return $this->courseRepository->find($id);
    }

    public function updateCourse(Course $course, array $data)
    {
        if (isset($data['image'])) {
            Storage::delete($course->image);
            $data['image'] = $data['image']->store('images');
        }
        if (isset($data['promotional_video'])) {
            Storage::delete($course->promotional_video);
            $data['promotional_video'] = $data['promotional_video']->store('videos');
        }
        return $this->courseRepository->update($course, $data);
    }

    public function deleteCourse(Course $course)
    {
        Storage::delete($course->image);
        Storage::delete($course->promotional_video);
        $this->courseRepository->delete($course);
    }
}
