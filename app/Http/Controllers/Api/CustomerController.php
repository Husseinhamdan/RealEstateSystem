<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use http\Message;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->index();
        return response()->json([
            'data' => $customers,
            'message' => 'this all customers',
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {

        $customer = $this->customerService->store($request);
        return response()->json([
            'data' => $customer,
            'message' => 'customer add successfully',
            'status' => 200
        ]);
    }

    public function show($id)
    {
        $customer = $this->customerService->show($id);
        return response()->json([
            'data' => $customer,
            'message' => 'this id ' . $customer->firstName . ' customer',
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customerService->update($request, $id);
        return response()->json([
            'data' => $customer,
            'message' => 'upadated successfully',
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $this->customerService->destroy($id);
        return response()->json([
            'message' => 'customer is delete'
        ]);
    }
}
