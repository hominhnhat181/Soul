@extends('frontend.layouts.master')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div class="content">
    <div class="container-fluid">
        @foreach ($feature as $ft)
        <div class="feature_music">
            <div class="music_title">
                <a href="">{{ $ft->name }}</a>
            </div>
            <div class="row">
                @php $counter = 1 @endphp
                @foreach ($ft->albums as $ab)
                @if ($ab->feature_id == $ft->id && $ab->status == 1)
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
                @php $counter += 1 @endphp
                @if ($counter > 5)
                @break;
                @endif
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
        {{-- END POINT --}}

    </div>
</div>
<script>
    var site_url = "{{ url('/') }}";   
    var page = 1;
    
    load_more(page);
 
    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() >= $(document).height()) {
       page++;
       load_more(page);
       }
     });
 
     function load_more(page){
         $.ajax({
           url: site_url + "/" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
             $('.feature_music').show();
           }
         })
         .done(function(data)
         {          
           if(data.length == 0){
           $('.feature_music').html("No more records!");
           return;
         }
           $('.feature_music').hide();
           $('.container-fluid').append(data);
         })
        //  .fail(function(jqXHR, ajaxOptions, thrownError)
        //  {
        //    alert('No response from server');
        //  });
     }
 </script>
@endsection