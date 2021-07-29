@extends('backend.layouts.master')

@section('content')
    <div class="main_contain" id="admin">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>{{__('dashboard.Overview')}}</h2>
            </div>
            @include('flash::message')
            <div class="main_contain-object row">
                <div class="object col-sm" style="background-image: url('front/images/1216364.jpg'); background-size:cover">
                    <div class="object_list">
                        <a href="{{Route('admin.user.index')}}">{{__('dashboard.ttuser')}}</a>
                    </div>
                    <span style="color: rgb(255, 255, 255)">{{count($data['user'])}}</span>
                </div>
                <div class="object col-sm"style="background-image: url('front/images/download.jpg'); background-size:cover">
                    <div class="object_list">
                        <a href="{{Route('admin.feature.index')}}" style="color: rgb(186, 206, 243)">{{__('dashboard.ttfeature')}}</a>
                    </div>
                    <span style="color: rgb(213, 213, 241)">{{count($data['feature'])}}</span>
                </div>
                <div class="object col-sm"style="background-image: url('front/images/pjvic9eq4vt41.jpg'); background-size:cover; background-position:center">
                    <div class="object_list">
                        <a  href="{{Route('admin.album.index')}}">{{__('dashboard.ttalbum')}}</a>
                    </div>
                    <span style="color: rgb(213, 224, 243)">{{count($data['album'])}}</span>
                </div>
            </div>
            <div class="main_contain-object row">
                <div class="object col-sm"style="background-image: url('front/images/mountains-digital-art-minimalist-l9.jpg'); background-size:cover; background-position:center">
                    <div class="object_list">
                        <a href="{{Route('admin.genre.index')}}" style="color: rgb(216, 228, 250)">{{__('dashboard.ttgenre')}}</a>
                    </div>
                    <span style="color: rgb(222, 231, 247)">{{count($data['genre'])}}</span>
                </div>
                <div class="object col-sm"style="background-image: url('front/images/5039978.jpg'); background-size:cover; background-position:center">
                    <div class="object_list">
                        <a href="{{Route('admin.track.index')}}">{{__('dashboard.tttrack')}}</a>
                    </div>
                    <span style="color: rgb(86, 139, 245)"> {{count($data['track'])}}</span>
                </div>
                <div class="object col-sm"style="background-image: url('front/images/oject-back.jpg'); background-size:cover; background-position:center">
                    <div class="object_list">
                        <a href="{{Route('admin.artist.index')}}"style="color: rgb(221, 232, 253)">{{__('dashboard.ttartist')}}</a>
                    </div>
                    <span style="color: rgb(213, 213, 241)">{{count($data['artist'])}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
