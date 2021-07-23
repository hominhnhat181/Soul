<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Feature;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $feature = Feature::get();
       return view('frontend.home.index', compact('feature'));

    }
}
