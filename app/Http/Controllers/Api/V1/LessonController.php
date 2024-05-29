<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Services\LessonService;
use App\Models\Lesson;
use App\Models\Section;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    public function index(Section $section)
    {
        return $this->lessonService->getAllLessonsBySection($section->id);
    }

    public function store(StoreLessonRequest $request, Section $section)
    {
        $data = $request->validated();
        $data['section_id'] = $section->id;
        return $this->lessonService->createLesson($data);
    }

    public function show(Section $section, $id)
    {
        return $this->lessonService->getLessonById($id);
    }

    public function update(UpdateLessonRequest $request, Section $section, Lesson $lesson)
    {
        return $this->lessonService->updateLesson($lesson, $request->validated());
    }

    public function destroy(Section $section, Lesson $lesson)
    {
        $this->lessonService->deleteLesson($lesson);
        return response()->noContent();
    }
}
