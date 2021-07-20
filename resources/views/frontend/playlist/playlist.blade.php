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
        <tbody>
            @foreach ($data as $dt)
                <tr  value="Off" id="tr">
                    <a class="" href="google.com"></a>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
