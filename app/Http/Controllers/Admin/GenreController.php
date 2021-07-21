<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\GenreService;

class GenreController
{
    private $genreService;
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $data = $this->genreService->show();
        return view('backend.genrehood.genre', compact('data'));
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
        $st = Tag::findOrFail($id);
        if ($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        } else {
            $st->status = "2";
        }
        $st->save();
        flash("Change status success")->success();
        return redirect()->Route('admin.genre.index');
    }
}
