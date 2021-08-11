@extends('backend.layouts.master')
@section('title')
Album Detail
@endsection
@section('content')
<div class="main_contain">
    <div class="main_contain-hover">
        <div class="main_contain-title">
            <h2>Albums</h2>
        </div>
        <form class="" id="sort_user" action="" method="GET">
            <div class="row mb-2">
                <div class="admin_search col-md-12">
                    <i class="material-icons search">search</i>
                    <input class="admin_search-input" value="{{ request('search') }}" name="search" type="text"
                        placeholder="Search... typing album or feature">
                </div>
                <div class="admin_search col-md-4" id="alphax">
                    <i class="material-icons more">expand_more</i>
                    <input id="datepicker" class="admin_search-chose" id="joined_date" name="joined_date"
                        value="{{ request('joined_date') }}" autocomplete="off" placeholder="Date">
                </div>
                <div class="admin_search col-md-4" id="alphay">
                    <i class="material-icons more">expand_more</i>
                    <select class="admin_search-chose" id="select_user" name="status">
                        <option value="">Status</option>
                        {{-- if request('status') == value option then selected, else fail --}}
                        <option value="1" {{ request('status') == "1" ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ request('status') == "2" ? 'selected' : '' }}>Deactive</option>
                        <option value="3" {{ request('status') == "3" ? 'selected' : '' }}>Unverify</option>
                    </select>
                </div>
                {{-- *** --}}
                <?php
                    $request = request()->all();
                    $newRequest = http_build_query($request);
                    ?>
                {{-- *** --}}
                <div class="admin_search col-md-4 row" id="omega">
                    <button type="submit" class="admin_search-btn col-md" href="">Search</button>

                    <a class="admin_search-btn col-md" href="{{ route('admin.album.index') }}">Reset</a>
                    <a class="admin_search-btn col-md" href="">Excel</a>
                    <a class="admin_search-btn col-md" href="{{ Route('admin.album.create') }}">Create</a>
                </div>
            </div>
            @include('flash::message')
        </form>
        <div class="table_view">
            <div class="table_hover">
                <table class="true_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Album</th>
                            <th>Feature</th>
                            <th class="center">Image</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th class="center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($album) && count($album))
                        @foreach ($album as $ab)
                        <tr>
                            <td>{{ $ab->id }}</td>
                            <td>{{ $ab->name }}</td>
                            <td>{{ $ab->features->name }}</td>
                            <td class="center"><img class="table_img" src="{{ asset('/front/images/' . $ab->image) }}"
                                    alt=""></td>
                            @if ($ab->status == 0)
                            <td style="color: lightcoral">Not verify</td>
                            @elseif($ab->status == 1)
                            <td style="color: lightgreen">Active</td>
                            @else
                            <td style="color: lightcoral">De-active</td>
                            @endif
                            <td>{{ $ab->created_at->toDateString() }}</td>
                            <td>
                                <div class="ct row">
                                    <a href="{{ Route('admin.album.edit', ['id' => $ab->id]) }}"
                                        class="ct_btn col-md-3">Detail</a>
                                    @if ($ab->status == 0 || $ab->status == 2)
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ab->id }}">Active</a>
                                    @else
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ab->id }}">Deactive</a>
                                    @endif
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterD{{ $ab->id }}">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{ $album->links('vendor.pagination.custom-pagination') }}
    </div>
</div>
@foreach ($album as $ab)
<!-- Modal status-->
<div class="modal fade" id="ModalCenterS{{ $ab->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Change Status Album</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure about that?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ Route('admin.album.status', ['id' => $ab->id]) }}"><button type="button"
                        class="btn btn-primary">Save changes</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete -->

    <div class="modal fade" id="ModalCenterD{{ $ab->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Delete Album</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure about that?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    <button data-url="{{ Route('admin.album.destroy', ['id' => $ab->id]) }}" data-id="{{$ab->id}}" class="btn btn-primary deleteRecord">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/back/js/caledar.js')}}"></script>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).on('click', '.deleteRecord', function() {
    var id = $(this).data("id");
    var url = $(this).data("url")

    $.ajax(
    {
        url: url,
        type: "DELETE",
        data: {
            "id": id,
            "_token": "{{ csrf_token() }}",
        },
        success: function (response){
            location.reload();
        },
        error: function(xhr) {
         console.log(xhr.responseText); 
        }
    });
});
</script>