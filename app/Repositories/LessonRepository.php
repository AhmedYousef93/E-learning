<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    public function getAllBySection($sectionId)
    {
        return Lesson::where('section_id', $sectionId)->get();
    }

    public function create(array $data)
    {
        return Lesson::create($data);
    }

    public function find($id)
    {
        return Lesson::findOrFail($id);
    }

    public function update(Lesson $lesson, array $data)
    {
        $lesson->update($data);
        return $lesson;
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
    }
}
