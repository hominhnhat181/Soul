<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Services\AlbumService;

class AlbumController 
{
    private $albumService;
    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function show(){
        $rela = 'features';
        $data = $this->albumService->showWithRelation($rela);
        return view('backend.albumhood.album', compact('data'));
    }
}
