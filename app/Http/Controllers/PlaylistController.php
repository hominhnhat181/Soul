<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function goPlaylist($id)
    {
        $data = Track::where('album_id', $id)->where('status', 1)->get();
        return view('frontend.playlist.playlist', compact('data'));
    }

    public function sendData()
    {
        $data = Track::where('status', 1)->get();
        return view('frontend.inc.footer', compact('data'));
    }


    public function getAudio(Track $track)
    {
        // way 1 custom url 
        // $path = storage_path("app/public/{$track->song}");
        // way 2 origin url (app/public)
        $path = Storage::url($track->song);

        if (!File::exists($path)) abort(404);
        $file = File::get($path);
        $type = File::mimeType($file);

        $response = Response::make($path, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    // public function getAudio($song)
    // {
    //     $file = Storage::url($song);
    //     return (new Response($file, 200))->header('Content-Type', 'audio/mp3');
    // }
}
