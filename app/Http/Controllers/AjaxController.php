<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

class AjaxController extends Controller
{
    public function store(AuthRequest $request)
    {
        $request->all();
        return response()->json(['success'=>'Contact form submitted successfully']);
    }
}
