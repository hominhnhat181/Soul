@extends('frontend.layouts.master')

@section('content')


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
                                        {{-- <a class="link_album" href=""><span></span></a> --}}
                                        <div class="card-header card-header-warning card-header-icon">
                                                <img src="{{ asset('/front/images/'.$ab->images) }}">
                                            <div class="card_album">
                                                <a href="" class="card-category">{{ $ab->name }}</a>
                                                <a href="" class="card-title">
                                                    @foreach ($ab->tags as $role)
                                                        {{ $role->name }} @endforeach
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="#">{{ $ab->title }}</a>
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
