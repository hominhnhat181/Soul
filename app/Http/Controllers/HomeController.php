<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Feature;
use App\Models\Tag;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware(['admin']);
    //     Middleware('admin');
    // }

    public function index(){
        $feature = Feature::where('status', 1)->get();
       return view('frontend.home.index', compact('feature'));

    }
}
