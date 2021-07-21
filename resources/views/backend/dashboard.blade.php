@extends('backend.layouts.master')

@section('content')
    <div class="main_contain" id="admin">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>Over View</h2>
            </div>
            <div class="main_contain-object row">
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.user.index')}}">Total User</a>
                    </div>
                    <span>{{$data['user']}}</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.feature.index')}}">Total Feature</a>
                    </div>
                    <span>{{$data['feature']}}</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.album.index')}}">Total Album</a>
                    </div>
                    <span>{{$data['album']}}</span>
                </div>
            </div>
            <div class="main_contain-object row">
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.genre.index')}}">Total Genres</a>
                    </div>
                    <span>{{$data['genre']}}</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.track.index')}}">Total Track</a>
                    </div>
                    <span>{{$data['track']}}</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="{{Route('admin.artist.index')}}">Total Single & Band</a>
                    </div>
                    <span>{{$data['artist']}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
