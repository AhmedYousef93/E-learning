<?php

namespace App\Interface;

interface AuthRepositoryInterface
{
    public function attemptAdminLogin(array $credentials);

}
