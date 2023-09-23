<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface AuthInterface
{
    public function login(Request $request, array $credentials): JsonResponse;
    public function register(Request $request, array $credentials): JsonResponse;
}