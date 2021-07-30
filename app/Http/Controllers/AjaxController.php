<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Feature;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getArticles(Request $request)
    {
        $feature = Feature::orderBy('id')->paginate(5);
        $output = '';
        $last_id = '';
        if ($request->ajax()) {
            foreach ($feature as $ft) {
                $artilces .= '
                <div class="feature_music">
                    <div class="music_title">
                        <a href="">{{'.$ft->name.'}}</a>
                    </div>
                    <div class="row">
                        @php' .$counter.' = 1 @endphp
                        @foreach ('.$ft->albums .'as'. $ab.')
                        @if'. ($ab->feature_id == $ft->id && $ab->status == 1).'
                        <div class="col-sm">
                            <div class="card card-stats">
                                <a class="link_album" href="{{Route("playlist",["id"=>'.$ab->id.'])}}"><span></span></a>
                                <div class="card-header card-header-warning card-header-icon">
                                    <img src="{{ asset('/front/images/'.'.$ab->image.') }}">
                                    <div class="card_album">
                                        <div>
                                            <a href="" class="card-category">{{ '.$ab->name.' }}</a>
                                        </div>
                                        @foreach ('.$ab->tags .'as'. $role.')
                                        <a href="" class="card-title">{{ '.$role->name.' }} </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <p href="#">{{ Str::limit('.$ab->title.', 34) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php '.$counter.' += 1 @endphp
                        @if ('.$counter.' > 5)
                        @break;
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                ';
            }
            return $artilces;
        }
        return view('frontend.home.index',compact('feature'));
    }
}
