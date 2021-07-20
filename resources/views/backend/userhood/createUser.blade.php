@extends('backend.layouts.master')

@section('content')

    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/back/css/auth_img.css') }}">
    </head>
    <div class="main_contain">
        <div class="main_contain-create">
            <form class="" id="sort_features" action="{{ Route('admin.user.store') }}" method="Post">
                @csrf
                <div class="form_create">
                    <div class="form_create-ctn">
                        <div class="ctn_title">
                            <h2>Create User</h2>
                        </div>
                        <div class="row">
                            <div class="ctn_input col-md-6">
                                <div class="input_obj ">
                                    <h4>User name</h4>
                                    <input name="name" type="text">
                                </div>
                                <div class="input_obj ">
                                    <h4>Email</h4>
                                    <input name="email" type="text">
                                </div>
                                <div class="input_obj ">
                                    <button class="btn btn-danger submit_btn">Save</button>
                                </div>
                            </div>
                            <div class="ctn_input col-md-6" style="margin-top: -53px">
                                <div class="account-settings col-md-5 ">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <div id="profile-container ">
                                                <img id="profileImage" src="{{ asset('/front/images/origin.png') }}" />
                                            </div>
                                            <input id="imageUpload" type="file" name="image" placeholder="Photo" capture>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/back/js/auth.js') }}"></script>

@endsection