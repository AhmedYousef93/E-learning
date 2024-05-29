<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Services\SectionService;
use App\Models\Course;
use App\Models\Section;

class SectionController extends Controller
{
    protected $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index(Course $course)
    {
        return $this->sectionService->getAllSectionsByCourse($course->id);
    }

    public function store(StoreSectionRequest $request, Course $course)
    {
        $data = $request->validated();
        $data['course_id'] = $course->id;
        return $this->sectionService->createSection($data);
    }

    public function show(Course $course, $id)
    {
        return $this->sectionService->getSectionById($id);
    }

    public function update(UpdateSectionRequest $request, Course $course, Section $section)
    {
        return $this->sectionService->updateSection($section, $request->validated());
    }

    public function destroy(Course $course, Section $section)
    {
        $this->sectionService->deleteSection($section);
        return response()->noContent();
    }
}

