<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends BaseApiController
{
    public function login(Request $request): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return $this->responseError(['error' => 'Unauthorized'], 401);
        }

        return $this->responseSuccess([
            'success' => true,
            'username' => auth()->user()->name,
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
    public function logout(): JsonResponse
    {
        auth()->logout();
        return $this->responseSuccess(true);
    }

    public function me(): JsonResponse
    {
        $user = auth()->user();
        return $this->responseSuccess($user);
    }
}
