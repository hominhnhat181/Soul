<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table ='tracks';
    protected $fillable =[
        'name','images','song','album_id','artist_id','tag_id'
    ] ;

    public function albums(){
        return $this->belongsTo(Album::class);
    }

    public function artists(){
        return $this->belongsTo(Artist::class);
    }

    public function tags(){
        return $this->belongsTo(Tag::class);
    }

    
}
