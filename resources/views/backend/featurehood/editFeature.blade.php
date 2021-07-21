@extends('backend.layouts.master')
@section('title')
    Create New Feature
@endsection
@section('content')

    <div class="main_contain">
        <div class="main_contain-create">
            @foreach ($data as $data)
                <form class="" id="sort_features" action="{{ Route('admin.feature.update', ['id' => $data->id]) }}"
                    method="Post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form_create">
                        <div class="form_create-ctn">
                            <div class="ctn_title">
                                <h2>Update Feature</h2>
                            </div>
                            <div class="row">
                                <div class="ctn_input col-md-6">
                                    <div class="input_obj ">
                                        <h4>Feature name</h4>
                                        <input name="name" value="{{ $data->name }}" type="text">
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
