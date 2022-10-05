<?php


namespace App\Service;


use App\Http\RequestValidation\ownerValidation\OwnerValidation;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerService implements CrudService
{

    public function index()
    {
        $owners = Owner::get();
        return $owners;
    }

    public function store(Request $request)
    {
        $validator = (new OwnerValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $owner = Owner::create($request->all());
        }
        return $owner;
    }

    public function show($id)
    {
        $owner = Owner::find($id);
        return $owner;
    }

    public function update(Request $request, $id)
    {
        $validator = (new OwnerValidation())->DataValidation($request);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $owner = Owner::find($id);
            $owner->update($request->all());
        }
        return $owner;
    }

    public function destroy($id)
    {
        $owner = Owner::find($id);
        $owner->delete();
    }
}
