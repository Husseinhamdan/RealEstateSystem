<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\estateService\EstateService;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    protected $estateService;

    public function __construct(EstateService $estateService)
    {
        $this->estateService = $estateService;
    }

    public function index()
    {
        $estates= $this->estateService->index();
        return response()->json([
            'data'=>$estates,
            'message'=>'this is all Estates',
            'status'=>200
        ]);
    }

    public function getEstateType($id)
    {
        $type=$this->estateService->getType($id);
        return response()->json([
           'type'=>$type
        ]);
    }
    public function getEstateOwner($id)
    {
        $owner=$this->estateService->getOwner($id);
        return response()->json([
            'type'=>$owner
        ]);
    }
}
