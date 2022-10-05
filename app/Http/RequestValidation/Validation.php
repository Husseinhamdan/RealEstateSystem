<?php

namespace App\Http\RequestValidation;

use Illuminate\Http\Request;

interface Validation
{
    public function getRules();

    public function getMessages();

    public function DataValidation(Request $request);

}
