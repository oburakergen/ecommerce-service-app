<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthRepository $authRepository) {}

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        return $this->authRepository->login($request, $credentials);
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->validated();

        return $this->authRepository->register($request, $credentials);
    }
}
