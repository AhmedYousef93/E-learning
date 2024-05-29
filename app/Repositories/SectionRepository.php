<?php

namespace App\Repositories;

use App\Models\Section;

class SectionRepository
{
    public function getAllByCourse($courseId)
    {
        return Section::where('course_id', $courseId)->get();
    }

    public function create(array $data)
    {
        return Section::create($data);
    }

    public function find($id)
    {
        return Section::findOrFail($id);
    }

    public function update(Section $section, array $data)
    {
        $section->update($data);
        return $section;
    }

    public function delete(Section $section)
    {
        $section->delete();
    }
}
