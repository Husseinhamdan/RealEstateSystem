<?php


namespace App\Http\RequestValidation\userValidation;


use App\Http\RequestValidation\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateUserValidation implements Validation
{

    public function getRules()
    {
        return $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function getMessages()
    {
        return $messages = [
            'name.required' => 'name is required',
            'name.string' => 'name must be string',
            'name.max' => 'name must be less than 255 char',
            'email.require' => 'email is required',
            'email.email' => 'correct the email'
        ];
    }

    public function DataValidation(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(), $rules, $messages);
        return $validator;
    }
}
