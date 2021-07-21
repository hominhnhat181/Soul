@extends('backend.layouts.master')
@section('title')
   Update Album
@endsection
@section('content')
    <div class="main_contain">
        <div class="main_contain-create">
            @foreach ($data as $data)
                <form class="" id="sort_features" action="{{ Route('admin.album.update', ['id' => $data->id]) }}"
                    method="Post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form_create">
                        <div class="form_create-ctn">
                            <div class="ctn_title">
                                <h2>Create Album</h2>
                            </div>
                            <div class="row">
                                <div class="ctn_input col-md-6">
                                    <div class="input_obj ">
                                        <h4>Album name</h4>
                                        <input name="name" value="{{ $data->name }}" type="text">
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Title</h4>
                                        <input name="title" value="{{ $data->title }}" type="text">
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Desc</h4>
                                        <input name="desc" value="{{ $data->title }}" type="text">
                                    </div>
                                </div>
                                <div class="ctn_input col-md-6" style="margin-top: -53px">
                                    <div class="account-settings col-md-4 ">
                                        <div class="user-profile">
                                            <div class="user-avatar">
                                                <div id="profile-container ">
                                                    <img id="profileImage" src="{{ asset('front/images/'.$data->image) }}" />
                                                </div>
                                                <input id="imageUpload" type="file" name="image" placeholder="Photo" capture>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Feature</h4>
                                        <select class="one" name="feature_id" style="width: 100%">
                                            <option value="{{ $data->features->id }} ">{{ $data->features->name }}
                                            </option>
                                            @foreach ($feature as $ft)
                                                <option value="{{ $ft->id }} ">{{ $ft->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="ctn_input col-md-12">
                                    <div class="input_obj" id="genre">
                                        <h4 >Genre: 
                                            @foreach ($data->tags as $ogg)
                                            <a href="{{Route('admin.genre.index')}}" style="font-size: 14px; font-weight: 500; color:black";>{{ $ogg->name }}, </a>
                                            @endforeach </h4>
                                        <select name="tag_id[]" id="choices-multiple-remove-button"
                                            placeholder="Select new genres?" multiple>
                                            @foreach ($genre as $genre)
                                            <option  value="{{ $genre->id }} ">{{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input_obj ">
                                        <button class="btn btn-danger submit_btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
