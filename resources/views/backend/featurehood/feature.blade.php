@extends('backend.layouts.master')

@section('content')
    <div class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>Features</h2>
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
                        <a class="admin_search-btn col-md" href="{{Route('admin.feature.create')}}">Create</a>
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
                                <th>Feature Name</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th style="text-align: center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ft)
                                <tr>
                                    <td>{{ $ft->id }}</td>
                                    <td>{{ $ft->name }}</td>
                                    @if ($ft->status == 0)
                                        <td style="color: lightcoral">Not verify</td>
                                    @elseif($ft->status == 1)
                                        <td style="color: lightgreen">Active</td>
                                    @else
                                        <td style="color: lightcoral">De-active</td>
                                    @endif
                                    <td>{{ $ft->created_at->toDateString() }}</td>
                            <td>
                                <div class="ct row">
                                    <a href="{{Route('admin.feature.edit', ['id' => $ft->id])}}" class="ct_btn col-md-3">Detail</a>
                                    @if($ft->status == 0 || $ft->status == 2)
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal" data-target="#ModalCenterS{{$ft->id}}">Active</a>
                                    @else
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal" data-target="#ModalCenterS{{$ft->id}}">Deactive</a>
                                    @endif
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal" data-target="#ModalCenterD{{$ft->id}}">Delete</a>
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
    @foreach ($data as $ft)

<!-- Modal status-->
<div class="modal fade" id="ModalCenterS{{$ft->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Change Status Feature</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure about that? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <a href="{{Route('admin.feature.status',['id' => $ft->id])}}"><button type="button" class="btn btn-primary">Save changes</button></a> 
        </div>
      </div>  
    </div>
  </div>
  <!-- Modal delete -->
  <div class="modal fade" id="ModalCenterD{{$ft->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Delete Feature</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure about that? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{Route('admin.feature.destroy', ['id' => $ft->id])}}"><button type="button" class="btn btn-primary">Save changes</button></a>
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
