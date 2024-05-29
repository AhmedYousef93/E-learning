<?php

namespace App\Services;

use App\Models\School;
use App\Models\SchoolClass;

class SchoolClassService
{
    public function getAllClasses(School $school)
    {
        return $school->classes; // Assuming a one-to-many relationship
    }

    public function createClass(School $school, array $data)
    {
        return $school->classes()->create($data);
    }

    public function getClass(School $school, SchoolClass $class)
    {
        return $class;
    }

    public function updateClass(School $school, SchoolClass $class, array $data)
    {
        $class->update($data);
        return $class;
    }

    public function deleteClass(School $school, SchoolClass $class)
    {
        $class->delete();
        return response()->noContent();
    }

    public function addStudent(SchoolClass $class, $studentId)
    {

        if ($class->students()->where('student_id', $studentId)->exists()) {
            return response()->json(['message' => 'Student already in class'], 400);
        }

        $class->students()->attach($studentId);

        return response()->noContent();
    }
}
