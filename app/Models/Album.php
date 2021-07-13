<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table ='albums';
    protected $fillable =[
        'name','images','title','desc','feature_id','status'
    ] ;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'album_tag', 'album_id', 'tag_id');
    }

    public function artist()
    {
        return $this->belongsToMany(Artist::class,'artist_album', 'artist_id','album_id');
    }

   
}
