@extends('backend.layouts.master')
@section('title')
    Update Track
@endsection
@section('content')
    <div class="main_contain">
        <div class="main_contain-create">
            @foreach ($data as $tr)
                <form class="" id="sort_features" action="{{ Route('admin.track.update', ['id' => $tr->id]) }}" method="Post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form_create">
                        <div class="form_create-ctn">
                            <div class="ctn_title">
                                <h2>Update Track</h2>
                            </div>
                            <div class="row">
                                <div class="ctn_input col-md-6">
                                    <div class="input_obj ">
                                        <h4>Track name</h4>
                                        <input value="{{ $tr->name }}" name="name" type="text">
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Artist</h4>
                                        <select class="one" name="artist_id">
                                            <option value="{{ $tr->artists->id }} ">{{ $tr->artists->name }}
                                            </option>
                                            @foreach ($artist as $art)
                                                <option value="{{ $art->id }} ">{{ $art->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Album</h4>
                                        <select class="one" name="album_id">
                                            <option value="{{ $tr->albums->id }} ">{{ $tr->albums->name }}
                                            </option>
                                            @foreach ($album as $ab)
                                                <option value="{{ $ab->id }} ">{{ $ab->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Genre</h4>
                                        <select class="one" name="tag_id">
                                            <option value="{{ $tr->tags->id }} ">{{ $tr->tags->name }}
                                            </option>
                                            @foreach ($genre as $gr)
                                                <option value="{{ $gr->id }} ">{{ $gr->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Song</h4>
                                        <input value="{{ $tr->song }}" name="song" type="file">
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
                                                    <img id="profileImage"
                                                        src="{{ asset('/front/images/'.$tr->image) }}" />
                                                </div>
                                                <input id="imageUpload" type="file" name="image" placeholder="Photo"
                                                    capture>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('assets/back/js/auth.js') }}"></script>
@endsection
