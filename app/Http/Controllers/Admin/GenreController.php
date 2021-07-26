<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\GenreService;
use Illuminate\Support\Facades\DB;
class GenreController
{
    private $genreService;
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index(Request $request)
    {   
        $typing_search = null;
        $genre = $this->getData($request, $typing_search, 8);
        return view('backend.genrehood.genre', compact('genre'));
    }


    private function getData($request, $typing_search, $is_paginate = 0)
    {
        $genre = Tag::orderBy('id', 'desc');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $typing_search = $request->search;
            $genre = $genre->where(function ($tag) use ($typing_search) {
                $tag->Where(DB::raw("CONCAT('#',id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('name', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $genre = $genre->where('status', "0");
            } else {
                $genre = $genre->where('status', $request->status);
            }
        }
        if ($request->joined_date) {
            $genre = $genre->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $genre = $genre->paginate($is_paginate);
        } else {
            $genre = $genre->get();
        }
        return $genre;
    }


    public function create()
    {
        return view('backend.genrehood.createGenre');
    }


    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->genreService->store($attributes);
        flash("Create Genre success")->success();
        return redirect()->Route('admin.genre.index');
    }


    public function edit($id)
    {
        $data = Tag::where('id', $id)->get();
        return view('backend.genrehood.editGenre', compact('data'));
    }


    public function update($id, Request $request)
    {
        $attributes = $request->except('_token', '_method');
        $this->genreService->update($id, $attributes);
        flash("Update Genre success")->success();
        return redirect()->Route('admin.genre.index');
    }

    public function destroy($id)
    {
        $this->genreService->destroy($id);
        return back();
    }


    public function show()
    {
    }


    public function changeStatus($id)
    {
         $this->genreService->changeStatus($id);
        return redirect()->Route('admin.genre.index');
    }
}
