<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Services\FeatureService;

class FeatureController
{
    private $featureService;
    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function index()
    {
        $data = $this->featureService->show();
        return view('backend.featurehood.feature', compact('data'));
    }

    
    public function show()
    {
    }


    public function create()
    {
        return view('backend.featurehood.createFeature');
    }


    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->featureService->store($attributes);
        flash("Create Feature success")->success();
        return redirect()->Route('admin.feature.index');
    }


    public function edit($id)
    {
        $data = Feature::where('id', $id)->get();
        return view('backend.featurehood.editFeature', compact('data'));
    }


    public function update($id, Request $request)
    {
        $attributes = $request->except('_token', '_method');
        $this->featureService->update($id, $attributes);
        flash("Update Feature success")->success();
        return redirect()->Route('admin.feature.index');
    }

    public function destroy($id)
    {
        $this->featureService->destroy($id);
        flash("Delete Album success")->success();
        return back();
    }


    public function changeStatus($id)
    {
        $st = Feature::findOrFail($id);
        if ($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        } else {
            $st->status = "2";
        }
        $st->save();
        flash("Change status success")->success();
        return redirect()->Route('admin.feature.index');
    }
}
