<?php


namespace App\Service\estateService;


use App\Models\Estate;
use App\Models\Estate_type;
use App\Models\Owner;
use App\Service\CrudService;
use Illuminate\Http\Request;

class EstateService
{

    public function index()
    {
        $estates = Estate::get();
        return $estates;
    }


    public function getType($id)
    {
        $estate= Estate::find($id);
        return $estate->type;
    }
    public function getOwner($id)
    {
        $estate= Estate::find($id);
        return $estate->owner;
    }
}
