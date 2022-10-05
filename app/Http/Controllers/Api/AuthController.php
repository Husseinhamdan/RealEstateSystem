<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\RequestValidation\authValidation\RegisterValidation;
use App\Service\AuthService;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->middleware('auth:api', ['except' => ['login', 'register','registerAdmin']]);
    }

    public function login(Request $request)
    {
        return $this->authService->login($request);
    }

    public function register(Request $request)
    {
        return $this->authService->register($request);
    }
    public function registerAdmin(Request $request)
    {
        return $this->authService->registerAdmin($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
    public function refresh()
    {
        return $this->authService->refresh();
    }
}
