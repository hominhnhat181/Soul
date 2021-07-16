<?php

namespace App\Http\Controllers\Admin;

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

    public function show(){
        $data = $this->userService->show();
        return view('backend.userhood.user', compact('data') );
    }


    // public function index(Request $request)
    // {
    //     $sort_search = null;
    //     $customers = $this->getData($request,$sort_search, 10);
    //     return view('backend.users.index', compact('customers','sort_search'));
    // }

    // private function getData($request,$sort_search = null, $is_paginate = 0){
    //     $customers = User::where('is_admin','<>',1)->orderBy('id', 'desc');
    //     if ($request->has('search')){
    //         $sort_search = $request->search;
    //         $customers = $customers->where(function($user) use ($sort_search){
    //             $user
    //             ->Where(\DB::raw("CONCAT('#',id)"), 'like', '%'.$sort_search.'%')
    //             ->orwhere('name', 'like', '%'.$sort_search.'%')
    //             ->orWhere('phone','like', '%'.$sort_search.'%')
    //             ->orWhere('email', 'like', '%'.$sort_search.'%');
    //         });
    //     }
    //     if($request->joined_date){
    //         $customers = $customers->whereDate('created_at', $request->joined_date);
    //     }
    //     if( $request->status ){
    //         $customers = $customers->where('status', $request->status);
    //     }
    //     if($is_paginate){
    //         $customers = $customers->paginate($is_paginate);
    //     }else{
    //         $customers = $customers->get();
    //     }
    //     return $customers;
    // }

    // public function updateStatus(Request $request)
    // {
    //     $id = $request->id;
    //     $customer = User::findOrFail($id);
    //     if($request->type == "Active User"){
    //         $customer->status = '1';
    //     }else{
    //         $customer->status = '2';
    //     }
    //     $customer->save();
    //     return response()->json(['status'=>true], 200);
    // }

    // public function create()
    // {
    //     return view('backend.users.create');
    // }

    // public function store(UserRequest $request)
    // {
    //     $request->merge(['password' => Hash::make($request->password)]);
    //     User::create($request->all());
    //     flash("Update status success")->success();
    //     return redirect()->route('users.index');
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     return view('backend.users.detail')->with(compact('user'));
    // }

    // public function update(UserRequest $request, $id)
    // {
    //     $data = $request->only(['name', 'email', 'phone', 'city_id', 'district_id', 'ward_id', 'address']);
    //     if (!empty($request->password)) {
    //         $request->merge(['password' => Hash::make($request->password)]);
    //         $data = $request->only(['name', 'email', 'phone', 'password', 'city_id', 'district_id', 'ward_id', 'address']);
    //     }
    //     $user = User::where('id', $id)->update($data);
    //     flash(__('Update User SuccessFull'))->success();
    //     return back();
    // }

    // public function destroy($id)
    // {
    //     $customers = User::findOrFail($id);
    //     $customers->delete();
    //     flash(__('Delete User SuccessFull'))->success();
    //     return back();
    // }

    // public function export(Request $request)
    // {
    //     $customers = $this->getData($request, null, 0);
    //     return Excel::download(new UserExport($customers), 'UserExport.xlsx');
    // }
}
