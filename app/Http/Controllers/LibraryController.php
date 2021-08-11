<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{   

    public function library($user_id){
        $user = User::where('id',$user_id)->get();
        return view('frontend.home.library', compact('user'));
    }

     // Library Add
     public function addLibrary(Request $request){
        $data = Album::find($request->album_id);
        $data->users()->sync(Auth::user()->id);
        return $data;
    }


    public function destroy($id){
        Album_User::where('album_id', $id)->delete();
        
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
        // return redirect()->route('libraryDestroy');
    }
}
