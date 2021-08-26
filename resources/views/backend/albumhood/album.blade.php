@extends('backend.layouts.master')
@section('title')
Album Detail
@endsection
@section('content')
<div id="pages" class="main_contain">
    <div class="main_contain-hover">
        <div class="main_contain-title">
            <h2>Albums</h2>
        </div>
        <form class="" id="sort_user" action="" method="GET">
            <div class="row ">
                <div class="admin_search col-xl-12 col-md-12">
                    <i class="material-icons search">search</i>
                    <input class="admin_search-input" value="{{ request('search') }}" autocomplete="off" name="search" type="text"
                        placeholder="Search... typing album or feature" id="search">
                    <div id="objectList"></div>
                </div>
                <div class="admin_search col-xl-4 col-md-7" id="alphax">
                    <i class="material-icons more">expand_more</i>
                    <input id="datepicker" class="admin_search-chose" id="joined_date" name="joined_date"
                        value="{{ request('joined_date') }}" autocomplete="off" placeholder="Date">
                </div>
                <div class="admin_search col-xl-3 col-md-5" id="alphay">
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
                <div class="admin_search col-xl-5 col-md-12 row" id="omega">
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
                                        class="ct_btn col-xl-8  col-sm-12">Detail</a>
                                    @if ($ab->status == 0 || $ab->status == 2)
                                    <a href="" class="ct_btn col-xl-8  col-sm-12" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ab->id }}">Active</a>
                                    @else
                                    <a href="" class="ct_btn col-xl-8  col-sm-12" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ab->id }}">Deactive</a>
                                    @endif
                                    <a href="" class="ct_btn col-xl-8  col-sm-12" data-toggle="modal"
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
            <div class="modal-body">Are you sure about that?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-id="{{$ab->id}}" data-url="{{ Route('admin.album.status', ['id' => $ab->id]) }}"
                    class="btn btn-primary changeStatus">Save changes</button>
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
            <div class="modal-body">Are you sure about that?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-url="{{ Route('admin.album.destroy', ['id' => $ab->id]) }}" data-id="{{$ab->id}}"
                    class="btn btn-primary deleteRecord">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endforeach

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/back/js/caledar.js')}}"></script>

<script>
    // Delete
    $(document).on('click', '.deleteRecord', function() {
        var id = $(this).data("id");
        var url = $(this).data("url")

        $.ajax({
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

    // Status
    $(document).on('click','.changeStatus', function(){
        var id = $(this).data("id");
        var url = $(this).data("url");

        $.ajax({
            url:url,
            type:"POST",
            data:{
                "id": id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response){
                location.reload();
            },
            error: function(xhr){
                console.log(xhr.responseText); // Save time
            }
        });
    });

    // search
    $(document).ready(function(){
        $('#search').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if(query != ''){

                $.ajax({
                    url:"{{route('admin.album.fillSearch')}}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        query:query, 
                        "_token": "{{ csrf_token() }}"
                    },
                    success:function(data){ //dữ liệu nhận về
                        $('#objectList').fadeIn();  
                        $('#objectList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là objectList
                    },
                    error: function(xhr){
                    console.log(xhr.responseText); // Save time
                    }   
                });
            }
        });
        $(document).on('click', 'li', function(){  
            $('#search').val($(this).text());  
            $('#objectList').fadeOut();  
        });
        $(document).on('click', '#pages', function(){  
            $('#objectList').fadeOut();
        });
    });
</script>

@endsection