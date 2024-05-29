<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }

    public function createStudent(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->studentRepository->create($data);
    }

    public function getStudentById($id)
    {
        return $this->studentRepository->find($id);
    }

    public function updateStudent(Student $student, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->studentRepository->update($student, $data);
    }

    public function deleteStudent(Student $student)
    {
        $this->studentRepository->delete($student);
    }
}
