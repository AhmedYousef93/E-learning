<?php


namespace App\Services;

use App\Repositories\AdminRepository;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAllAdmins()
    {
        return $this->adminRepository->getAll();
    }

    public function createAdmin(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->adminRepository->create($data);
    }

    public function getAdminById($id)
    {
        return $this->adminRepository->find($id);
    }

    public function updateAdmin(Admin $admin, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->adminRepository->update($admin, $data);
    }

    public function deleteAdmin(Admin $admin)
    {
        $this->adminRepository->delete($admin);
    }
}
