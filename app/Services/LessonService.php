<?php 

namespace App\Services;

use App\Repositories\LessonRepository;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonService
{
    protected $lessonRepository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }

    public function getAllLessonsBySection($sectionId)
    {
        return $this->lessonRepository->getAllBySection($sectionId);
    }

    public function createLesson(array $data)
    {
        if (isset($data['file'])) {
            $data['file'] = $data['file']->store('files');
        }
        return $this->lessonRepository->create($data);
    }

    public function getLessonById($id)
    {
        return $this->lessonRepository->find($id);
    }

    public function updateLesson(Lesson $lesson, array $data)
    {
        if (isset($data['file'])) {
            Storage::delete($lesson->file);
            $data['file'] = $data['file']->store('files');
        }
        return $this->lessonRepository->update($lesson, $data);
    }

    public function deleteLesson(Lesson $lesson)
    {
        Storage::delete($lesson->file);
        $this->lessonRepository->delete($lesson);
    }
}
