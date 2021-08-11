<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Feature;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\AlbumService;
use Illuminate\Support\Facades\DB;

class AlbumController
{
    private $albumService;
    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }


    public function index(Request $request)
    {
        $typing_search = null;
        $album = $this->getData($request, $typing_search, 8);
        return view('backend.albumhood.album', compact('album'));
    }


    private function getData($request, $typing_search, $is_paginate = 0)
    {
        $album = Album::join('features', 'albums.feature_id', '=', 'features.id')->select('albums.*')->orderBy('albums.id', 'desc');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $typing_search = $request->search;
            $album = $album->where(function ($alb) use ($typing_search) {
                $alb->Where(DB::raw("CONCAT('#',albums.id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('features.name', 'like', '%' . $typing_search . '%')
                    ->orwhere('albums.name', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $album = $album->where('albums.status', "0");
            } else {
                $album = $album->where('albums.status', $request->status);
            }
        }
        if ($request->joined_date) {
            $album = $album->whereDate('albums.created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $album = $album->paginate($is_paginate);
        } else {
            $album = $album->get();
        }
        return $album;
    }


    public function show()
    {
    }


    public function create()
    {
        $feature = Feature::get();
        $tag = Tag::get();
        return view('backend.albumhood.createAlbum', compact('feature', 'tag'));
    }


    public function store(Request $request)
    {
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
        return redirect()->Route('admin.album.index');
    }


    public function edit($id)
    {
        $data = Album::with('features')->where('id', $id)->get();
        $feature = Feature::where('id', '!=', $data_feature = Album::findOrFail($id)->feature_id)->get();
        $genre = Tag::get();
        return view('backend.albumhood.editAlbum', compact('data', 'feature', 'genre'));
    }


    public function update($id, Request $request)
    {
        $attributes = $request->except('_token', 'originImage', 'tag_id', 'image', '_method');
        $album = Album::findOrFail($id);

        if (!empty($request->image)) {
            $attributes['image'] = $request->image;
        }
        if (!empty($request->tag_id)) {
            $album->tags()->sync($request->tag_id);
        }
        $this->albumService->update($id, $attributes);
        flash("Update Album success")->success();
        return redirect()->Route('admin.album.index');
    }

    public function destroy($id)
    {
        $this->albumService->destroy($id);
        flash("Delete Album Success")->success();
        return response()->json('Success', 200);
    }


    public function changeStatus($id)
    {
        $this->albumService->changeStatus($id);
        return response()->json('Success', 200);
    }
}
