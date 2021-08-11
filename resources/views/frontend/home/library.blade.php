@extends('frontend.layouts.master')

@section('content')
<div class="content">
    @foreach ($user as $us)
    <div class="container-fluid ">
        <div class="category">
            <ul class="type">
                <li><a href="">Playlists</a></li>
                <li><a href="">Artists</a></li>
                <li><a href="">Albums</a></li>
                <li><a href="">Else</a></li>
            </ul>
        </div>
        <div class="title">
            <h2>PLAYLISTS</h2>
        </div>
        <div class="row">
            @foreach ($us->albums as $ab)
            <div class="library col-md-2">
                <div class="library__object">
                    <i class="fas fa-ellipsis-h setting" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Delete from Library</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                    <div class="library__object--img">
                        <img src="{{asset('/front/images/'.$ab->image)}}" alt="">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="library__object--status">
                        <h4>{{$ab->name}}</h4>
                        <h5>{{$us->name}}</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Data Loader -->
    <div style="margin-top: 30px" class="auto-load text-center">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#000"
                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50"
                    to="360 50 50" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
    @endforeach

</div>

@endsection