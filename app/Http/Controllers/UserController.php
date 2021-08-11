<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    

    public function profile($id){
        $admins = User::where('id', $id)->get();
        return view('frontend.home.account',compact('admins'));
    }


   


}

