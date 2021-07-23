@extends('backend.layouts.master')
@section('title')
Update Feature
@endsection
@section('content')
<div class="main_contain">
    <div class="main_contain-hover">
        <div class="main_contain-title">
            <h2>Features</h2>
        </div>
        <form class="" id="sort_user" action="" method="GET">
            <div class="row mb-2">
                <div class="admin_search col-md-12">
                    <i class="material-icons search">search</i>
                    <input class="admin_search-input" value="{{ request('search') }}" name="search" type="text"
                        placeholder="Search...">
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
                    $newRequest = http_build_query($request)
                    ?>
                {{-- *** --}}
                <div class="admin_search col-md-4 row" id="omega">
                    <button type="submit" class="admin_search-btn col-md" href="">Search</button>

                    <a class="admin_search-btn col-md" href="{{ route('admin.feature.index') }}">Reset</a>
                    <a class="admin_search-btn col-md" href="">Excel</a>
                    <a class="admin_search-btn col-md" href="{{ Route('admin.feature.create') }}">Create</a>
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
                        @if(!empty($feature) && count($feature))
                        @foreach ($feature as $ft)
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
                                    <a href="{{ Route('admin.feature.edit', ['id' => $ft->id]) }}"
                                        class="ct_btn col-md-3">Detail</a>
                                    @if ($ft->status == 0 || $ft->status == 2)
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ft->id }}">Active</a>
                                    @else
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterS{{ $ft->id }}">Deactive</a>
                                    @endif
                                    <a href="" class="ct_btn col-md-3" data-toggle="modal"
                                        data-target="#ModalCenterD{{ $ft->id }}">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{ $feature->links('vendor.pagination.custom-pagination') }}
    </div>
</div>
@foreach ($feature as $ft)
<!-- Modal status-->
<div class="modal fade" id="ModalCenterS{{ $ft->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <a href="{{ Route('admin.feature.status', ['id' => $ft->id]) }}"><button type="button"
                        class="btn btn-primary">Save changes</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete -->
<form action="{{ Route('admin.feature.destroy', ['id' => $ft->id]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <div class="modal fade" id="ModalCenterD{{ $ft->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <a href="{{ Route('admin.user.destroy', ['userId' => $ft->id]) }}"><button type="submit"
                            type="button" class="btn btn-primary">Save changes</button></a>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/back/js/caledar.js')}}"></script>
@endsection