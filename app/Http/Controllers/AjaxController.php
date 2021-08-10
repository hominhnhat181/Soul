<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AjaxController extends Controller
{
    public function getArticles(Request $request)
    {
        $result = Feature::orderBy('id')->paginate(5);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($result as $ft) {
                $artilces .= '
                <div class="feature_music">
                    <div class="music_title">
                        <a href="">'.$ft->name.'</a>
                    </div>
                    <div class="row">';

                $counter = 1;
                foreach ($ft->albums as $ab){
                    if($ab->feature_id == $ft->id && $ab->status == 1){
                        $artilces .= '
                        <div class="col-sm">
                            <div class="card card-stats">
                                <a class="link_album" href="'.Route("playlist",["id"=>''.$ab->id.'']).'"><span></span></a>
                                <div class="card-header card-header-warning card-header-icon">
                                    <img src=" '.asset('/front/images/'.''.$ab->image.'').'">
                                    <i data-toggle="modal" data-target="#exampleModal'.$ab->id.'"  class="library material-icons">library_music</i>
                                    <div class="card_album">
                                        <div>
                                            <a href="" class="card-category"> '.$ab->name.' </a>
                                        </div>';

                        foreach($ab->tags as $role){
                            $artilces .= '<a href="" class="card-title">'.$role->name.'</a>';
                        }

                        $artilces .= '
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <p href="#">'.Str::limit($ab->title, '34').'</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade save__ajax" id="exampleModal'.$ab->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Want To Add This Album to Library?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="addRow(this)" data-url="'.Route('addLibrary').'" album-id="'.$ab->id.'" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>';

                        $counter += 1;
                        if($counter > 5){
                            break;
                        }
                    }
                }
                
                $artilces .= ' 
                    </div>
                </div>';
            }
            return $artilces;
        }
        return view('frontend.home.index');
    }


    public function addLibrary(Request $request){
        $data = Album::find($request->album_id);
        $data->users()->sync(Auth::user()->id);

        return response()->json('Success');
    }
}
