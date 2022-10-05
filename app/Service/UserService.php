<?php


namespace App\Service;


use App\Http\RequestValidation\authValidation\RegisterValidation;
use App\Http\RequestValidation\userValidation\UpdateUserValidation;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService implements CrudService
{

    public function index()
    {
        $users = User::get();
        return $users;
    }


    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return $user;
    }

    public function storeAdmin(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => 1
        ]);
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $validator = (new UpdateUserValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user = User::find($id);
            return $user->update($request->all());
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
