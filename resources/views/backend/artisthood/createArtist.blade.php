@extends('backend.layouts.master')
@section('title')
    Create New Artist & Band
@endsection
@section('content')
    <div class="main_contain">
        <div class="main_contain-create">
            <form class="" id="sort_features" action="{{ Route('admin.artist.store') }}" method="Post">
                @csrf
                <div class="form_create">
                    <div class="form_create-ctn">
                        <div class="ctn_title">
                            <h2>Create Artist & Band</h2>
                        </div>
                        <div class="row">
                            <div class="ctn_input col-md-6">
                                <div class="input_obj ">
                                    <h4>Artist & Band name</h4>
                                    <input name="name" type="text">
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
