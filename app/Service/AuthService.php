<?php


namespace App\Service;


use App\Http\RequestValidation\authValidation\LoginValidation;
use App\Http\RequestValidation\authValidation\RegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validation;

class AuthService
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }

    public function login(Request $request)
    {
        $validator = (new LoginValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $credentials = $request->only('email', 'password');
            $token = Auth::attempt($credentials);
            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], 401);
            }
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }

    }

    public function register(Request $request)
    {
        $validator = (new RegisterValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user =$this->userService->store($request);
            $token = Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }
    }

    public function registerAdmin(Request $request)
    {
        $validator = (new RegisterValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user =$this->userService->storeAdmin($request);
            $token = Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
