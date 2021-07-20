@extends('backend.layouts.master')

@section('content')
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ asset('assets/back/css/auth_img.css') }}">
    </head>
    <div class="main_contain">
        <div class="main_contain-create">
            <form class="" id="sort_features" action="{{ Route('admin.track.store') }}" method="Post">
                @csrf
                <div class="form_create">
                    <div class="form_create-ctn">
                        <div class="ctn_title">
                            <h2>Create Track</h2>
                        </div>
                        <div class="row">
                            <div class="ctn_input col-md-6">
                                <div class="input_obj ">
                                    <h4>Track name</h4>
                                    <input name="name" type="text">
                                </div>
                                <div class="input_obj ">
                                    <h4>Song</h4>
                                    <input name="song" type="file">
                                </div>
                                <div class="input_obj ">
                                    <h4>Artist</h4>
                                    <select class="one" name="artist_id">
                                        <option value="">Chose Artist</option>
                                        @foreach ($artist as $at)
                                            <option value="{{ $at->id }} ">{{ $at->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input_obj ">
                                    <h4>Album</h4>
                                    <select class="one" name="album_id">
                                        <option value="">Chose Album</option>
                                        @foreach ($album as $ab)
                                            <option value="{{ $ab->id }} ">{{ $ab->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input_obj ">
                                    <h4>Genre</h4>
                                    <select class="one" name="tag_id">
                                        <option value="">Chose Genre</option>
                                        @foreach ($genre as $gr)
                                            <option value="{{ $gr->id }} ">{{ $gr->name }}</option>
                                        @endforeach
                                    </select>
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
