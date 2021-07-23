<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Album,Artist,Feature,Tag,Track,User};
class DashboardController
{
    public function dashboard(){
        $data['feature'] = Feature::count();
        $data['album'] = Album::count();
        $data['genre'] = Tag::count();
        $data['track'] = Track::count();
        $data['artist'] = Artist::count();
        $data['user'] = User::count();
        return view('backend.dashboard', compact('data'));
    }


    public function account(){
        return  view('backend.account');

    }

}