<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Services\AdminService;
use App\Models\Admin;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return $this->adminService->getAllAdmins();
    }

    public function store(StoreAdminRequest $request)
    {
        return $this->adminService->createAdmin($request->validated());
    }

    public function show($id)
    {
        return $this->adminService->getAdminById($id);
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        return $this->adminService->updateAdmin($admin, $request->validated());
    }

    public function destroy(Admin $admin)
    {
        $this->adminService->deleteAdmin($admin);
        return response()->noContent();
    }
}

