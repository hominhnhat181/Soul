<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MusicService;
class MusicController extends Controller
{
    private $fakeService;
    public function __construct(MusicService $fakeService)
    {
        $this->fakeService = $fakeService;
    }

    public function index(Request $request)
    {
        $where = [];
        // $where[] = ['status','=',FakeShopStatus::ACTIVE];
        if(!empty($request->q)){
            $where[] = ['name','LIKE','%'.$request->q.'%'];
        }
        if(!empty($request->product)){
            $where[] = ['product_id','=',$request->product];
        }
        if(!empty($request->city_id)){
            $where[] = ['city_id','=',$request->city_id];
        }
        if(!empty($request->district_id)){
            $where[] = ['district_id','=',$request->district_id];
        }
        if(!empty($request->ward_id)){
            $where[] = ['ward_id','=',$request->ward_id];
        }
        $params = [
            'paginate' =>  10,
            'order_by'  =>  'id',
            'sort'  =>  'desc',
            'where' =>  $where
        ];
        $musics = $this->fakeService->getAlbums($params);
        return view('frontend.home.index',compact('musics'));
    }
}
