@extends('backend.layouts.master')

@section('content')

    <div class="main_contain">
        <div class="main_contain-create">
            @foreach ($data as $data)
                <form class="" id="sort_features" action="{{ Route('admin.genre.update', ['id' => $data->id]) }}"
                    method="Post">
                    @csrf
                    <div class="form_create">
                        <div class="form_create-ctn">
                            <div class="ctn_title">
                                <h2>Update Genre</h2>
                            </div>
                            <div class="row">
                                <div class="ctn_input col-md-6">
                                    <div class="input_obj ">
                                        <h4>Genre name</h4>
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
