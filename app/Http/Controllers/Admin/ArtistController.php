<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Services\BandArtistService;
use Illuminate\Support\Facades\DB;

class ArtistController {
    private $bandArtistService;
    public function __construct(BandArtistService $bandArtistService)
    {
        $this->bandArtistService = $bandArtistService;
    }

    public function index(Request $request){

        $typing_search = null;
        $artist = $this->getData($request, $typing_search, 8);
        return view('backend.artisthood.artist', compact('artist'));
    }   

    private function getData($request, $typing_search, $is_paginate = 0)
    {
        $customers = Artist::orderBy('id', 'desc');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $typing_search = $request->search;
            $customers = $customers->where(function ($user) use ($typing_search) {
                $user->Where(DB::raw("CONCAT('#',id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('name', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $customers = $customers->where('status', "0");
            } else {
                $customers = $customers->where('status', $request->status);
            }
        }
        if ($request->joined_date) {
            $customers = $customers->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $customers = $customers->paginate($is_paginate);
        } else {
            $customers = $customers->get();
        }
        return $customers;
    }



    public function create(){
        return view('backend.artisthood.createArtist');
    }


    public function store(Request $request){
        $attributes = $request->all();
        $this->bandArtistService->store($attributes);
        flash("Create Artist success")->success();
        return redirect()->route('admin.artist.index');
    }


    public function edit($id){
        $data = Artist::where('id',$id)->get();
        return view('backend.artisthood.editArtist',compact('data'));
    }


    public function update ($id, Request $request){
        $attributes = $request->except('_token','image','_method');
        if(!empty($request->image )){
            $attributes['image'] = $request->image;
        }
        $this->bandArtistService->update($id, $attributes);
        flash("Update Artist success")->success();
        return redirect()->route('admin.artist.index');
    }

    public function destroy($id){
        flash("Delete Artist success")->success();
        $this->bandArtistService->destroy($id);
        return back();
    }

    public function show($id)
    {
    }


    public function changeStatus($id){
        $this->bandArtistService->changeStatus($id);
        return redirect()->route('admin.artist.index');

    }
}
