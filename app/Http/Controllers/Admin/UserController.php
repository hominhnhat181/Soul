<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

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
        $data = $this->userService->show();
        $sort_search = null;
        $customers = $this->getData($request, $sort_search, 10);
        return view('backend.userhood.user', compact('data', 'sort_search', 'customers'));
    }


    private function getData($request, $sort_search = null, $is_paginate = 0)
    {
        $customers = User::where('is_admin', '<>', 1)->orderBy('id');
        // !empty (request->search)
        if ($request->has('search')) {
            // get request value
            $sort_search = $request->search;
            $customers = $customers->where(function ($user) use ($sort_search) {
                $user
                    ->Where(DB::raw("CONCAT('#',id)"), 'like', '%' . $sort_search . '%')
                    ->orwhere('name', 'like', '%' . $sort_search . '%')
                    ->orWhere('email', 'like', '%' . $sort_search . '%');
            });
        }
        // if($request->joined_date){
        //     $customers = $customers->whereDate('created_at', $request->joined_date);
        // }
        // if( $request->status ){
        //     $customers = $customers->where('status', $request->status);
        // }
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





    // public function export(Request $request)
    // {
    //     $customers = $this->getData($request, null, 0);
    //     return Excel::download(new UserExport($customers), 'UserExport.xlsx');
    // }
}
