<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Requests\AddStudentToClassRequest;
use App\Services\SchoolService;
use App\Models\School;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        return $this->schoolService->getAllSchools();
    }

    public function store(StoreSchoolRequest $request)
    {
        return $this->schoolService->createSchool($request->validated());
    }

    public function show($id)
    {
        return $this->schoolService->getSchoolById($id);
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        return $this->schoolService->updateSchool($school, $request->validated());
    }

    public function destroy(School $school)
    {
        $this->schoolService->deleteSchool($school);
        return response()->noContent();
    }

    public function addStudentToClass(AddStudentToClassRequest $request, SchoolClass $class)
    {
        $this->schoolService->addStudentToClass($class, $request->student_id);
        return response()->noContent();
    }
}
