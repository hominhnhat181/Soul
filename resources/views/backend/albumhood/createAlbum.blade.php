@extends('backend.layouts.master')
@section('title')
    Create New Album
@endsection
@section('content')


    <div class="main_contain">
        <div class="main_contain-create">
            <form class="" id="sort_features" action="{{ Route('admin.album.store') }}" method="Post">
                @csrf
                <div class="form_create">
                    <div class="form_create-ctn">
                        <div class="ctn_title">
                            <h2>Create Album</h2>
                        </div>
                        <div class="row">
                            <div class="ctn_input col-md-6">
                                <div class="input_obj ">
                                    <h4>Album name</h4>
                                    <input name="name" type="text">
                                </div>
                                <div class="input_obj ">
                                    <h4>Title</h4>
                                    <input name="title" type="text">
                                </div>
                                <div class="input_obj ">
                                    <h4>Desc</h4>
                                    <input name="desc" type="text">
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
                                <div class="input_obj ">
                                    <h4>Feature</h4>
                                    <select class="one" name="feature_id">
                                        @foreach ($feature as $ft)
                                            <option value="{{ $ft->id }} ">{{ $ft->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ctn_input col-md-12">
                                <div class="input_obj" id="genre">
                                    <h4>Genre (ctrl + click)</h4>
                                    <select name="tag_id[]" id="choices-multiple-remove-button"
                                        placeholder="Select upto 5 Genres" multiple>
                                        @foreach ($tag as $tag)
                                            <option value="{{ $tag->id }} ">{{ $tag->name }}</option>
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
        </div>
    </div>

    <script src="{{ asset('assets/back/js/auth.js') }}"></script>

@endsection

{{--  function addTodo() {
        var task = $('#task').val();
        let _url     = `/todos`;
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                todo: task,
                _token: _token
            },
            success: function(data) {
                    todo = data
                    $('table tbody').append(`
                        <tr id="todo_${todo.id}">
                            <td>${todo.id}</td>
                            <td>${ todo.todo }</td>
                            <td>
                                <a data-id="${ todo.id }" onclick="editTodo(${todo.id})" class="btn btn-info">Edit</a>
                                <a data-id="${todo.id}" class="btn btn-danger" onclick="deleteTodo(${todo.id})">Delete</a>
                            </td>
                        </tr>
                    `);

                    $('#task').val('');

                    $('#addTodoModal').modal('hide');
            },
            error: function(response) {
                $('#taskError').text(response.responseJSON.errors.todo);
            }
        });
    } --}}