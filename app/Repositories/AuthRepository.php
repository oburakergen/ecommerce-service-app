<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthRepository implements AuthInterface
{

    public function login(Request $request, array $credentials): JsonResponse
    {
        $token = auth()->attempt($credentials);

        if (!$token) {
            throw new HttpResponseException(response()->error(['errors' => 'Giriş Başarısız'], 404));
        }

        $request->session()->regenerate();

        return response()->success('Giriş Başarılı', 200);
    }

    public function register(Request $request, array $credentials): JsonResponse
    {
        try {
            $user = User::create($credentials);
        } catch (\Exception $e) {
            throw new HttpResponseException(response()->error(['errors' => $e->getMessage()], 404));
        }

        auth()->login($user);

        $request->session()->regenerate();

        return response()->success('Kayıt Başarılı', 200);
    }
}