<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\FeatureService;
class FeatureController 
{
    private $featureService;
    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function show(){
        $data = $this->featureService->show();
        return view('backend.featurehood.feature', compact('data') );
    }
}
