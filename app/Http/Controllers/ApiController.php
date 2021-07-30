<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // SEARCH API
    public function search($name){
        return Album::where('name','LIKE','%'.$name.'%')->get();
    }
}
