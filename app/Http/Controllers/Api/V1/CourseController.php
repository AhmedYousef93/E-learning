<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use App\Models\Course;
use App\Models\School;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(School $school)
    {
        return $this->courseService->getAllCoursesBySchool($school->id);
    }

    public function store(StoreCourseRequest $request, School $school)
    {
        $data = $request->validated();
        $data['school_id'] = $school->id;
        return $this->courseService->createCourse($data);
    }

    public function show(School $school, $id)
    {
        return $this->courseService->getCourseById($id);
    }

    public function update(UpdateCourseRequest $request, School $school, Course $course)
    {
        return $this->courseService->updateCourse($course, $request->validated());
    }

    public function destroy(School $school, Course $course)
    {
        $this->courseService->deleteCourse($course);
        return response()->noContent();
    }
}
