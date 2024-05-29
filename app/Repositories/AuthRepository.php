<?php

namespace App\Repositories;

use App\Interface\AuthRepositoryInterface;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    public function attemptAdminLogin(array $credentials)
    {
        return auth()->guard('admin')->attempt($credentials);
    }
}
