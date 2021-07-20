@extends('backend.layouts.master')

@section('content')
    <div class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>Tracks</h2>
            </div>
            <form class="" id="sort_features" action="" method="GET">
                <div class="row mb-2">
                    <div class="admin_search col-md-12">
                        <i class="material-icons search">search</i>
                        <input class="admin_search-input" type="text" placeholder="Search...">
                    </div>
                    <div class="admin_search col-md-4" id="alpha">
                        <i class="material-icons more">expand_more</i>
                        <input class="admin_search-chose" type="text" placeholder="Date">
                    </div>
                    <div class="admin_search col-md-4" id="alpha">
                        <i class="material-icons more">expand_more</i>
                        <input class="admin_search-chose" type="text" placeholder="Status">
                    </div>
                    <div class="admin_search col-md-4 row" id="omega">
                        <a class="admin_search-btn col-md" href="">Search</a>
                        <a class="admin_search-btn col-md" href="">Reset</a>
                        <a class="admin_search-btn col-md" href="">Excel</a>
                        <a class="admin_search-btn col-md" href="{{Route('admin.track.create')}}">Create</a>
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
                                <th>Track</th>
                                <th>Artist</th>
                                <th>Album</th>
                                <th>Genre</th>
                                <th class="center">Image</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th class="center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $tr)
                                <tr>
                                    <td>{{ $tr->id }}</td>
                                    <td>{{ $tr->name }}</td>
                                    <td>{{ $tr->artists->name }}</td>
                                    <td>{{ $tr->albums->name }}</td>
                                    <td>{{ $tr->tags->name }}</td>
                                    <td class="center"><img class="table_img" src="{{ asset('/front/images/'.$tr->image) }}" alt=""></td>
                                    @if ($tr->status == 0)
                                        <td style="color: lightcoral">Not verify</td>
                                    @elseif($tr->status == 1)
                                        <td style="color: lightgreen">Active</td>
                                    @else
                                        <td style="color: lightcoral">De-active</td>
                                    @endif
                                    <td>{{ $tr->created_at->toDateString() }}</td>
                            <td>
                                <div class="ct row">
                                    <a href="{{Route('admin.track.edit', ['id' => $tr->id])}}" class="ct_btn col-md-7">Detail</a>

                                    @if($tr->status == 0 || $tr->status == 2)
                                    <a href="" class="ct_btn col-md-7" data-toggle="modal" data-target="#ModalCenterS{{$tr->id}}">Active</a>
                                    @else
                                    <a href="" class="ct_btn col-md-7" data-toggle="modal" data-target="#ModalCenterS{{$tr->id}}">Deactive</a>
                                    @endif
                                    <a href="" class="ct_btn col-md-7" data-toggle="modal" data-target="#ModalCenterD{{$tr->id}}">Delete</a>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination">
                <ul>
                    <li class="prev disabled"><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li class="next"><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
    @foreach ($data as $tr)
    <!-- Modal status-->
<div class="modal fade" id="ModalCenterS{{$tr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
         <a href="{{Route('admin.track.status',['id' => $tr->id])}}"><button type="button" class="btn btn-primary">Save changes</button></a> 
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal delete -->
  <div class="modal fade" id="ModalCenterD{{$tr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <a href="{{Route('admin.track.destroy', ['id' => $tr->id])}}"><button type="button" class="btn btn-primary">Save changes</button></a>
          </div>
        </div>  
      </div>
    </div>
    @endforeach

    <script>
        $('.pagination li').on('click', function(event) {
            event.preventDefault();
            var $this = $(this),
                $pagination = $this.parent(),
                $pages = $pagination.children(),
                $active = $pagination.find('.active');

            if ($this.hasClass('prev')) {
                if ($pages.index($active) > 1) {
                    $active.removeClass('active').prev().addClass('active');
                }
            } else if ($this.hasClass('next')) {
                if ($pages.index($active) < $pages.length - 2) {
                    $active.removeClass('active').next().addClass('active');
                }
            } else {
                $this.addClass('active').siblings().removeClass('active');
            }
            $active = $pagination.find('.active');
            $('.prev')[$pages.index($active) == 1 ? 'addClass' : 'removeClass']('disabled');
            $('.next')[$pages.index($active) == $pages.length - 2 ? 'addClass' : 'removeClass']('disabled');
        });
        $('.pagination li:eq(1)').trigger('click');
    </script>
@endsection
