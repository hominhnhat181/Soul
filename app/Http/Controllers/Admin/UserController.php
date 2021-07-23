<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use DB;
use Illuminate\Support\Facades\Hash;

// use App\Models\User;
// use Excel;
// use App\Exports\UserExport;
// use Auth;
// // use App\Http\Requests\UserRequest;
// use App\Models\Province;
// use App\Models\District;
// use App\Models\Ward;
// use Illuminate\Support\Facades\Hash;

class UserController
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $typing_search = null;
        $customers = $this->getData($request, $typing_search, 10);
        return view('backend.userhood.user', compact('customers'));
    }


    private function getData($request, $typing_search, $is_paginate = 0)
    {
        $customers = User::where('is_admin', '<>', 1)->orderBy('id');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $typing_search = $request->search;
            $customers = $customers->where(function ($user) use ($typing_search) {
                $user->Where(DB::raw("CONCAT('#',id)"), 'like', '%' . $typing_search . '%')
                    ->orwhere('name', 'like', '%' . $typing_search . '%')
                    ->orWhere('email', 'like', '%' . $typing_search . '%');
            });
        }
        if ($request->status) {
            // option can't get value = 0
            if ($request->status == "3") {
                $customers = $customers->where('status', "0");
            } else {
                $customers = $customers->where('status', $request->status);
            }
        }
        if ($request->joined_date) {
            $customers = $customers->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $customers = $customers->paginate($is_paginate);
        } else {
            $customers = $customers->get();
        }
        return $customers;
    }


    public function create()
    {
        return view('backend.userhood.createUser');
    }


    public function store(Request $request)
    {
        $attributes = $request->all();
        if (!($request->image)) {
            $attributes['image'] = 'origin.png';
        }
        $attributes['password'] = Hash::make($request->password);
        $this->userService->store($attributes);
        flash("Create User success")->success();
        return redirect()->route('admin.user.index');
    }


    public function edit($id)
    {
        $data = User::where('id', $id)->get();
        return view('backend.userhood.editUser', compact('data'));
    }


    public function update($id, Request $request)
    {
        $attributes = $request->except('_token', 'image', '_method');
        if (!empty($request->image)) {
            $attributes['image'] = $request->image;
        }
        if (!empty($request->password)) {
            $attributes['password'] = Hash::make($request->password);
        }
        $this->userService->update($id, $attributes);
        flash("Update User success")->success();
        return redirect()->route('admin.user.index');
    }


    public function destroy($id)
    {
        $this->userService->destroy($id);
        flash("Delete User success")->success();
        return back();
    }


    public function show($id)
    {
    }


    public function changeStatus($id)
    {
        $st = User::findOrFail($id);
        if ($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        } else {
            $st->status = "2";
        }
        $st->save();
        flash("Change status success")->success();
        return redirect()->route('admin.user.index');
    }


    // ADMIN -----------------------------------------------------------------------------------

    public function admin($id){
        $admins = User::where('id',$id)->where('is_admin',1)->get();
        return view('backend.account',compact('admins'));
    }

    public function adminUpdate($id, Request $request){
        $attributes = $request->only('name','email');
        if (!empty($request->image)) {
            $attributes['image'] = $request->image;
        }
        if (!empty($request->password)) {
            $attributes['password'] = Hash::make($request->password);
        }
        $this->userService->update($id, $attributes);
        flash("Update Admin success")->success();
        return redirect()->route('admin.dashboard');

    }

    // public function export(Request $request)
    // {
    //     $customers = $this->getData($request, null, 0);
    //     return Excel::download(new UserExport($customers), 'UserExport.xlsx');
    // }
}
