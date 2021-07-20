@extends('frontend.layouts.master')

@section('content')

    <head>
    </head>

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            @foreach ($feature as $ft)
                <div class="feature_music">
                    <div class="music_title">
                        <a href="">{{ $ft->name }}</a>
                    </div>
                    <div class="row">
                        <span style="display: none">{{ $counter = 1 }}</span>
                        @foreach ($allAlbum as $ab)
                            @if ($ab->feature_id == $ft->id)
                                <div class="col-sm">
                                    <div class="card card-stats">
                                        <a class="link_album" href="{{Route('playlist',['id'=>$ab->id])}}"><span></span></a>
                                        <div class="card-header card-header-warning card-header-icon">
                                            <img src="{{ asset('/front/images/' . $ab->image) }}">
                                            <div class="card_album">
                                                <div>
                                                    <a href="" class="card-category">{{ $ab->name }}</a>
                                                </div>
                                                @foreach ($ab->tags as $role)
                                                    <a href="" class="card-title">{{ $role->name }} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <p href="#">{{ Str::limit($ab->title, 34) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span style="display: none">{{ $counter += 1 }}</span>
                                @if ($counter > 5)
                                @break;
                            @endif
                        @endif
            @endforeach
        </div>
    </div>
    @endforeach

    </div>
    </div>

@endsection



