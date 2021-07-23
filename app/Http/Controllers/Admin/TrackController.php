<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Tag;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Services\TrackService;
use Illuminate\Support\Facades\DB;

class TrackController
{
    private $trackService;
    public function __construct(TrackService $trackService)
    {
        $this->trackService = $trackService;
    }

    public function index(Request $request)
    {
        $typing_search = null;
        $track = $this->getData($request, $typing_search, 8);
        return view('backend.trackhood.track', compact('track'));
    }


    private function getData($request, $typing_search, $is_paginate = 0)
    {
        $track = Track::join('artists','tracks.artist_id','=','artists.id')
                        ->join('tags','tracks.tag_id','=','tags.id')
                        ->join('albums','tracks.album_id','=','albums.id')
                        ->select('tracks.*')->orderBy('tracks.id');
        if ($request->has('search')) {  
            $typing_search = $request->search;
            $track = $track->where(function ($user) use ($typing_search) {
                $user->Where(DB::raw("CONCAT('#',tracks.id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('tracks.name', 'like', '%' . $typing_search . '%')
                    ->orwhere('artists.name', 'like', '%' . $typing_search . '%')
                    ->orwhere('tags.name', 'like', '%' . $typing_search . '%')
                    ->orwhere('albums.name', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $track = $track->where('tracks.status', "0");
            } else {
                $track = $track->where('tracks.status', $request->status);
            }
        }
        if ($request->joined_date) {
            $track = $track->whereDate('tracks.created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $track = $track->paginate($is_paginate);
        } else {
            $track = $track->get();
        }
        return $track;
    }


    public function show()
    {
    }
    public function create()
    {
        $artist = Artist::get();
        $album = Album::get();
        $genre = Tag::get();
        return view('backend.trackhood.createTrack', compact('artist', 'album', 'genre'));
    }


    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->trackService->store($attributes);
        flash("Create Track success")->success();
        return redirect()->Route('admin.track.index');
    }


    public function edit($id)
    {
        $data = Track::where('id', $id)->get();
        $artist = Artist::where('id', '!=', $at = Track::findOrFail($id)->artist_id)->get();
        $album = Album::where('id', '!=', $ab = Track::findOrFail($id)->album_id)->get();
        $genre = Tag::where('id', '!=', $gr = Track::findOrFail($id)->tag_id)->get();
        return view('backend.trackhood.editTrack', compact('data', 'artist', 'album', 'genre'));
    }


    public function update($id, Request $request)
    {
        $attributes = $request->except('_token', 'image', '_method');
        if (!empty($request->image)) {
            $attributes['image'] = $request->image;
        }
        $this->trackService->update($id, $attributes);
        flash("Update Track success")->success();
        return redirect()->Route('admin.track.index');
    }

    public function destroy($id)
    {
        $this->trackService->destroy($id);
        flash("Delete Album success")->success();
        return back();
    }


    public function changeStatus($id)
    {
        $tr = Track::findOrFail($id);
        if ($tr->status == "0" || $tr->status == "2") {
            $tr->status = "1";
        } else {
            $tr->status = "2";
        }
        $tr->save();
        flash("Update status success")->success();
        return redirect()->Route('admin.track.index');
    }
}
