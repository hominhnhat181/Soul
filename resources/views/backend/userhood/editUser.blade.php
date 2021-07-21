@extends('backend.layouts.master')
@section('title')
    Update User
@endsection
@section('content')
    <div class="main_contain">
        <div class="main_contain-create">
            @foreach ($data as $data)
                <form class="" id="sort_features" action="{{ Route('admin.user.update', ['userId' => $data->id]) }}"
                    method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form_create">
                        <div class="form_create-ctn">
                            <div class="ctn_title">
                                <h2>Update User</h2>
                            </div>
                            <div class="row">
                                <div class="ctn_input col-md-6">
                                    <div class="input_obj ">
                                        <h4>Update User name</h4>
                                        <input name="name" value="{{ $data->name }}" type="text">
                                    </div>
                                    <div class="input_obj ">
                                        <h4>Update User email</h4>
                                        <input name="email" value="{{ $data->email }}" type="text">
                                    </div>
                                    <div class="input_obj ">
                                        <button class="btn btn-danger submit_btn">Save</button>
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
