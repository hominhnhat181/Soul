<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 // get tag value from game many to many relationship
 public function getValue(){

    $turma = Album::find(1);
    // dd($turma);
    foreach ($turma->tags as $as) {
        $d =  $as->pivot->tag_id;
        $tag = Tag::where('id', $d)->value('name');
        echo $tag.' <br>';
    }
}
}
