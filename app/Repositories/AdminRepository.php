<?php

namespace App\Repositories;
use App\Models\Admin;

class AdminRepository
{
    public function getAll()
    {
        return Admin::all();
    }

    public function create(array $data)
    {
        return Admin::create($data);
    }

    public function find($id)
    {
        return Admin::findOrFail($id);
    }

    public function update(Admin $admin, array $data)
    {
        $admin->update($data);
        return $admin;
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
    }
}
