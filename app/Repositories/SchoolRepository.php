<?php

namespace App\Repositories;
use App\Models\School;
use App\Models\SchoolClass;

class SchoolRepository
{
    public function getAll()
    {
        return School::all();
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function find($id)
    {
        return School::findOrFail($id);
    }

    public function update(School $school, array $data)
    {
        $school->update($data);
        return $school;
    }

    public function delete(School $school)
    {
        $school->delete();
    }

    public function addStudentToClass(SchoolClass $class, $studentId)
    {
        if ($class->students()->where('student_id', $studentId)->exists()) {
            throw new \Exception('Student already in class');
        }

        $class->students()->attach($studentId);
    }
}


