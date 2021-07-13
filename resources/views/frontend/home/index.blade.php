@extends('frontend.layouts.master')

@section('content')


    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">

            <div class="feature_music">
                <div class="music_title">
                    <h2>Pop Indie</h2>
                </div>
                <div class="row">
                    @foreach ($turma as $album)


                        <div class="col-sm">
                                <div class="card card-stats">
                                    <a class="link_album" href=""><span></span></a>
                                    <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">content_copy</i>
                                        </div>
                                        <div class="card_album">
                                            <a href="" class="card-category">{{ $album->name }}</a>
                                            <a href="" class="card-title">
                                                @foreach ($album->tags as $role)
                                                    {{ $role->name }} @endforeach
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <a href="#">{{ $album->title }}</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="feature_music">
                <div class="music_title">
                    <h2>Rap</h2>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Used Space</p>
                                <h3 class="card-title">49/50
                                    <small>GB</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-warning">warning</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Revenue</p>
                                <h3 class="card-title">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <p class="card-category">Fixed Issues</p>
                                <h3 class="card-title">75</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Tracked from Github
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">Followers</p>
                                <h3 class="card-title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">Followers</p>
                                <h3 class="card-title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
