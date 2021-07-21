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

    public function index(){
        $data = $this->bandArtistService->show();
        return view('backend.artisthood.artist', compact('data'));
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
        $st = Artist::findOrFail($id);
        if($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        }else {
            $st->status = "2";
        }
        $st->save();
        flash("Change status success")->success();
        return redirect()->route('admin.artist.index');

    }
}
