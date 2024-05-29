<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddStudentToClassRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolClassRequest;
use App\Models\School;
use App\Models\SchoolClass;
use App\Services\SchoolClassService;

class SchoolClassController extends Controller
{
    protected $schoolClassService;

    public function __construct(SchoolClassService $schoolClassService)
    {
        $this->schoolClassService = $schoolClassService;
    }

    public function index(School $school)
    {
        return $this->schoolClassService->getAllClasses($school);
    }

    public function store(SchoolClassRequest $request, School $school)
    {
        return $this->schoolClassService->createClass($school, $request->validated());
    }

    public function show(School $school, SchoolClass $class)
    {
        return $this->schoolClassService->getClass($school, $class);
    }

    public function update(SchoolClassRequest $request, School $school, SchoolClass $class)
    {
        return $this->schoolClassService->updateClass($school, $class, $request->validated());
    }

    public function destroy(School $school, SchoolClass $class)
    {
        return $this->schoolClassService->deleteClass($school, $class);
    }

    public function addStudentToClass(AddStudentToClassRequest $request, SchoolClass $class)
    {
        return $this->schoolClassService->addStudent($class, $request->student_id);
    }
}

