@extends('backend.layouts.master')

@section('content')
    <div class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>Feature</h2>
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
                        <button class="admin_search-btn col-md">Search</button>
                        <button class="admin_search-btn col-md">Reset</button>
                        <button class="admin_search-btn col-md">Excel</button>
                        <button class="admin_search-btn col-md">Create</button>
                    </div>
                </div>
            </form>
            <div class="table_view">
                <div class="table_hover">
                    <table class="true_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Band & Artist</th>
                                <th class="center">Image</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th class="center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ab)
                                <tr>
                                    <td>{{ $ab->id }}</td>
                                    <td>{{ $ab->name }}</td>
                                    <td class="center"><img class="table_img" src="{{ asset('/front/images/'.$ab->images) }}" alt=""></td>
                                    @if ($ab->status == 0)
                                        <td>Not verify</td>
                                    @elseif($ab->status == 1)
                                        <td>Active</td>
                                    @else
                                        <td>De-active</td>
                                    @endif
                                    <td>{{ $ab->created_at }}</td>
                            <td>
                                <div class="ct row">
                                    <button class="ct_btn col-md-3">Detail</button>
                                    <button class="ct_btn col-md-3">Deactive</button>
                                    <button class="ct_btn col-md-3">Delete</button>
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
