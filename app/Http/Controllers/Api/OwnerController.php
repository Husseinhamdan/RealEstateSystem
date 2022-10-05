<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\OwnerService;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    protected $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    public function index()
    {
        $owners = $this->ownerService->index();
        if($owners){
            return response()->json([
                'data' => $owners,
                'message' => 'this all owners',
                'status' => 200
            ]);
        }

    }

    public function store(Request $request)
    {

        $owner = $this->ownerService->store($request);
        if($owner){
            return response()->json([
                'data' => $owner,
                'message' => 'owner add successfully',
                'status' => 200
            ]);
        }

    }

    public function show($id)
    {
        $owner = $this->ownerService->show($id);
        if ($owner){
            return response()->json([
                'data' => $owner,
                'message' => 'this id ' . $owner->firstName . ' owner',
                'status' => 200
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $owner = $this->ownerService->update($request, $id);
        if ($owner){
            return response()->json([
                'data' => $owner,
                'message' => 'upadated successfully',
                'status' => 200
            ]);
        }

    }

    public function destroy($id)
    {
        $this->ownerService->destroy($id);
        return response()->json([
            'message' => 'owner is delete'
        ]);
    }
}
