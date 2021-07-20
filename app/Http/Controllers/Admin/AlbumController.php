<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Feature;
use App\Models\Tag;
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


    public function create(){
        $feature = Feature::get();
        $tag = Tag::get();
        return view('backend.albumhood.createAlbum', compact('feature','tag'));
    }


    public function store(Request $request){
        $attributes = $request->all();
        $album = new Album();
        $album->name = $attributes['name'];
        $album->title = $attributes['title'];
        $album->desc = $attributes['desc'];
        $album->image = $attributes['image'];
        $album->feature_id = $attributes['feature_id'];
        // have new album id when save
        $album->save();
        // seed new album relation value 
        $album->tags()->sync($request->tag_id);
        flash("Create Album success")->success();
        return redirect('admin/album');
    }


    public function edit($id){
        $data = Album::with('features')->where('id',$id)->get();
        $feature = Feature::where('id','!=',$data_feature=Album::findOrFail($id)->feature_id)->get();
        $genre = Tag::get();
        return view('backend.albumhood.editAlbum',compact('data','feature','genre'));
    }


    public function update ($id, Request $request){
        $attributes = $request->except('_token','originImage','tag_id','image');
        $album = Album::findOrFail($id);

        if(!empty($request->image )){
            $attributes['image'] = $request->image;
        }
        if(!empty($request->tag_id)){
            $album->tags()->sync($request->tag_id);
        }
        $this->albumService->update($id, $attributes);
        flash("Update Album success")->success();
        return redirect(Route('admin.album'));
    }

    public function destroy($id){
        $this->albumService->destroy($id);
        return back();
    }

    
    public function changeStatus($id){
        $ab = Album::findOrFail($id);
        if($ab->status == "0" || $ab->status == "2") {
            $ab->status = "1";
        }else {
            $ab->status = "2";
        }
        $ab->save();
        flash("Update status success")->success();
        return redirect('admin/album');

    }
}
