<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function goPlaylist($id){
        $data = Track::where('album_id',$id)->where('status',1)->get();
        return view('frontend.playlist.playlist',compact('data'));
    }

    public function sendData(){
        $track = Track::where('status',1)->get();
        return view('frontend.inc.footer',compact('track'));
    }
    
}
