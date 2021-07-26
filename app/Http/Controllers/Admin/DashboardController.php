<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Album,Artist,Feature,Tag,Track,User};
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin']);
    }
    
    public function dashboard(){
        $data['feature'] = Feature::get();
        $data['album'] = Album::get();
        $data['genre'] = Tag::get();
        $data['track'] = Track::get();
        $data['artist'] = Artist::get();
        $data['user'] = User::get();
        return view('backend.dashboard', compact('data'));
    }


    public function account(){
        return  view('backend.account');

    }

}