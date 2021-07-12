<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table ='albums';
    protected $fillable =[
        'name','images','title','desc'
    ] ;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'album_tag', 'album_is', 'tag_id');
    }

    public function artist()
    {
        return $this->belongsToMany(Artist::class,'artist_album', 'artist_id','album_id');
    }

    // get tag value from game many to many relationship
    public function getValue(){
        $turma = Tag::find(1);
        foreach ($turma->tags as $as) {
            $d =  $as->pivot->tag_id;
            $tag = Tag::where('id', $d)->value('name');
            echo $tag.' <br>';
        }
    }
}
