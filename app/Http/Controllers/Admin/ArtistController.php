<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
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

    public function create(){
        return view('backend.artisthood.createArtist');
    }


    public function store(Request $request){
        $attributes = $request->all();
        if(!($request->image)){
            $attributes['image'] = 'origin.png';
        }
        $this->bandArtistService->store($attributes);
        flash("Create Artist success")->success();
        return redirect(Route('admin.artist'));
    }


    public function edit($id){
        $data = Artist::where('id',$id)->get();
        return view('backend.artisthood.editArtist',compact('data'));
    }


    public function update ($id, Request $request){
        $attributes = $request->except('_token','image');
        if(!empty($request->image )){
            $attributes['image'] = $request->image;
        }
        $this->bandArtistService->update($id, $attributes);
        flash("Update Artist success")->success();
        return redirect(Route('admin.artist'));
    }

    public function destroy($id){
        $this->bandArtistService->destroy($id);
        return back();
    }

    
    public function changeStatus($id){
        $st = Artist::findOrFail($id);
        if($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        }else {
            $st->status = "2";
        }
        $st->save();
        flash("Change status success")->success();
        return redirect(Route('admin.artist'));
    }
}
