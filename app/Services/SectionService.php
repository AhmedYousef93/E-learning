<?php
namespace App\Services;

use App\Repositories\SectionRepository;
use App\Models\Section;

class SectionService
{
    protected $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function getAllSectionsByCourse($courseId)
    {
        return $this->sectionRepository->getAllByCourse($courseId);
    }

    public function createSection(array $data)
    {
        return $this->sectionRepository->create($data);
    }

    public function getSectionById($id)
    {
        return $this->sectionRepository->find($id);
    }

    public function updateSection(Section $section, array $data)
    {
        return $this->sectionRepository->update($section, $data);
    }

    public function deleteSection(Section $section)
    {
        $this->sectionRepository->delete($section);
    }
}
