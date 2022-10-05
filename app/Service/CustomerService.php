<?php


namespace App\Service;


use App\Http\RequestValidation\customerValidation\customerValidation;
use App\Http\RequestValidation\ownerValidation\OwnerValidation;
use App\Models\Customer;
use App\Models\Owner;
use Illuminate\Http\Request;

class CustomerService implements CrudService
{

    public function index()
    {
        $customers = Customer::get();
        return $customers;
    }

    public function store(Request $request)
    {
        $validator = (new CustomerValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $customer = Customer::create($request->all());
        }
        return $customer;
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }

    public function update(Request $request, $id)
    {
        $validator = (new customerValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $customer = Customer::find($id);
            $customer->update($request->all());
        }
        return $customer;
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
    }
}
