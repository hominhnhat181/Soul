<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\TrackService;

class TrackController 
{
    private $trackService;
    public function __construct(TrackService $trackService)
    {
        $this->trackService = $trackService;
    }

    public function show(){
        $data = $this->trackService->show();
        return view('backend.trackhood.track', compact('data') );
    }
}
