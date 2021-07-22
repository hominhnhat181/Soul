<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Services\FeatureService;
use DB;
class FeatureController
{
    private $featureService;
    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function index(Request $request)
    {
        $typing_search = null;
        $feature = $this->getData($request, $typing_search, 8);
        return view('backend.featurehood.feature', compact('feature'));
    }

    private function getData($request, $typing_search, $paginate = 0)
    {
        $feature = Feature::orderBy('id');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $typing_search = $request->search;
            $feature = $feature->where(function ($fea) use ($typing_search) {
                $fea->Where(DB::raw("CONCAT('#',id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('name', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $feature = $feature->where('status', "0");
            } else {
                $feature = $feature->where('status', $request->status);
            }
        }
        if ($request->joined_date) {
            $feature = $feature->whereDate('created_at', $request->joined_date);
        }
        if ($paginate) {
            $feature = $feature->paginate($paginate);
        } else {
            $feature = $feature->get();
        }
        return $feature;
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
