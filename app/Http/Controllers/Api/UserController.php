<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return response()->json([
            'data' => $users,
            'message' => 'this all users',
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($request, $id);
        return response()->json([
            'data' => $user,
            'message' => 'this updated user',
            'status' => 200
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->show($id);
        return response()->json([
            'data' => $user,
            'message' => 'this is ' . $user->name . ' user',
            'status' => 200
        ]);

    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return response()->json([
            'message' => 'delete user successfully',
            'status' => 200
        ]);
    }
}
