<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use App\Models\Student;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return $this->studentService->getAllStudents();
    }

    public function store(StoreStudentRequest $request)
    {
        return $this->studentService->createStudent($request->validated());
    }

    public function show($id)
    {
        return $this->studentService->getStudentById($id);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        return $this->studentService->updateStudent($student, $request->validated());
    }

    public function destroy(Student $student)
    {
        $this->studentService->deleteStudent($student);
        return response()->noContent();
    }
}
