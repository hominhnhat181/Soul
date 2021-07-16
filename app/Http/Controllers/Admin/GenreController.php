<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\GenreService;

class GenreController 
{
    private $genreService;
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function show(){
        $data = $this->genreService->show();
        return view('backend.genrehood.genre', compact('data') );
    }
}
