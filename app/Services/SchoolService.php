<?php
namespace App\Services;

use App\Repositories\SchoolRepository;
use App\Models\School;
use App\Models\SchoolClass;
use Exception;

class SchoolService
{
    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function getAllSchools()
    {
        return $this->schoolRepository->getAll();
    }

    public function createSchool(array $data)
    {
        return $this->schoolRepository->create($data);
    }

    public function getSchoolById($id)
    {
        return $this->schoolRepository->find($id);
    }

    public function updateSchool(School $school, array $data)
    {
        return $this->schoolRepository->update($school, $data);
    }

    public function deleteSchool(School $school)
    {
        $this->schoolRepository->delete($school);
    }

    public function addStudentToClass(SchoolClass $class, $studentId)
    {
        try {
            $this->schoolRepository->addStudentToClass($class, $studentId);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
