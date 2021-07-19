<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Feature;
use App\Models\Tag;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

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

   
}
