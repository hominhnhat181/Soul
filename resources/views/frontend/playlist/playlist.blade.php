@extends('frontend.layouts.master')

@section('content')
<div class="playlist">
    <div class="top_playlist">

    </div>
    <div class="playlist_table">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Album</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody class="playlist">
                @foreach ($data as $dt)
                <tr>
                    <th scope="row" class="center">{{$dt->id}}</th>
                    <td class="title_track" style="display: flex">
                        <img src="{{url('front/images/'.$dt->image)}}" alt="">
                        <div class="info">
                            <a href="" id="track">{{$dt->name}}</a>
                            <br>
                            <a href="" id="artist">{{$dt->artists->name}}</a>
                        </div>
                    </td>
                    <td>{{$dt->albums->name}}</td>
                    <td>{{$dt->tags->name}}</td>
                    <td>{{$dt->created_at}}</td>
                    <td>
                        <a onclick="play{{$dt->id}}()" id="btn{{$dt->id}}"><i style="font-size: 18px" class="far fa-play-circle"></i></a>
                        <audio id="{{$dt->id}}" preload="auto" loop="false">
                            <source src="{{url('front/audio/'.$dt->song)}}" type="audio/mp3">
                        </audio>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection