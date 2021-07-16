<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BandArtistService;

class ArtistController {
    private $bandArtistService;
    public function __construct(BandArtistService $bandArtistService)
    {
        $this->bandArtistService = $bandArtistService;
    }

    public function show(){
        $data = $this->bandArtistService->show();
        return view('backend.artisthood.artist', compact('data'));
    }
}
