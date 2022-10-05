<?php


namespace App\Http\RequestValidation\customerValidation;


use App\Http\RequestValidation\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class customerValidation implements Validation
{

    public function getRules()
    {
        return $rules = [
            'firstName' => 'required|string|max:15',
            'lastName' => 'required|string|max:15',
            'phone' => 'required|numeric',
            'address' => 'required|max:255'

        ];
    }

    public function getMessages()
    {
        return $messages = [
            'firstName.required' => 'first name is require',
            'lastName.required' => 'last name is require',
            'firstName.string' => 'first name is not correct',
            'lastName.string' => 'last name is not correct',
            'phone.required' => 'phone is required',
            'phone.max' => 'phone is over 15'

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
