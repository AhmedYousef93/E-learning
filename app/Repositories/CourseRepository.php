<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function getAllBySchool($schoolId)
    {
        return Course::where('school_id', $schoolId)->get();
    }

    public function create(array $data)
    {
        return Course::create($data);
    }

    public function find($id)
    {
        return Course::findOrFail($id);
    }

    public function update(Course $course, array $data)
    {
        $course->update($data);
        return $course;
    }

    public function delete(Course $course)
    {
        $course->delete();
    }
}
