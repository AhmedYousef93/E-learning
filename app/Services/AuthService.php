<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Interface\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        return $this->authRepository->attemptAdminLogin($credentials);
    }
}
