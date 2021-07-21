@extends('backend.layouts.master')
@section('title')
    Feature Detail
@endsection
@section('content')
    <div class="main_contain">
        <div class="main_contain-create">
            <form class="" id="sort_features" action="{{ Route('admin.feature.store') }}" method="Post">
                @csrf
                <div class="form_create">
                    <div class="form_create-ctn">
                        <div class="ctn_title">
                            <h2>Create Feature</h2>
                        </div>
                        <div class="row">
                            <div class="ctn_input col-md-6">
                                <div class="input_obj ">
                                    <h4>Feature name</h4>
                                    <input name="name" type="text">
                                </div>
                                <div class="input_obj ">
                                    <button class="btn btn-danger submit_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
