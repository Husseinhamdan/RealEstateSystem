<?php


namespace App\Service;




use Illuminate\Http\Request;

interface CrudService
{
    public function index();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request,$id);
    public function destroy($id);
}
