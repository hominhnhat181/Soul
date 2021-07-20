<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- plugin --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> 

    {{-- icon --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/front/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/front/img/favicon.png')}}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{asset('assets/front/css/material-dashboard.css')}}" rel="stylesheet" />

    <title>Home</title>
</head>
<body class="dark-edition">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=495127995056192&autoLogAppEvents=1" nonce="mgnraTKs"></script>
    @include('frontend.inc.header')
    @include('frontend.inc.sidebar')

    @yield('content')

    @include('frontend.inc.footer')
    
  </div>
  {{-- Player --}}
  <div class="player">
      <ul>
          <li class="cover">
              <div class="player_info" style="display: flex">
                  <div class="player_img">
                      <img
                          src="http://i1285.photobucket.com/albums/a583/TheGreatOzz1/Hosted-Images/Noisy-Freeks-Image_zps4kilrxml.png" />
                  </div>
                  <div class="player_track">
                      <h1>The Noisy Freaks</h1>
                      <h2>I Need You Back</h2>
                  </div>
              </div>
          </li>
          <li class="info">
              <div class="controls">
                  <span class="expend"><svg class="step-backward" viewBox="0 0 25 25" xml:space="preserve">
                          <g>
                              <polygon points="4.9,4.3 9,4.3 9,11.6 21.4,4.3 21.4,20.7 9,13.4 9,20.7 4.9,20.7" />
                          </g>
                      </svg></span>
                  <svg id="play" viewBox="0 0 25 25" xml:space="preserve">
                      <defs>
                          <rect x="-49.5" y="-132.9" width="446.4" height="366.4" />
                      </defs>
                      <g>
                          <circle fill="none" cx="12.5" cy="12.5" r="10.8" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z" />
                      </g>
                  </svg>
                  <svg id="pause" viewBox="0 0 25 25" xml:space="preserve">
                      <g>
                          <rect x="6" y="4.6" width="3.8" height="15.7" />
                          <rect x="14" y="4.6" width="3.9" height="15.7" />
                      </g>
                  </svg>
                  <span class="expend"><svg class="step-foreward" viewBox="0 0 25 25" xml:space="preserve">
                          <g>
                              <polygon
                                  points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7" />
                          </g>
                      </svg>
                  </span>
              </div>
              <div class="button-items">
                  <audio id="music" preload="auto" loop="false">
                      <source src="{{url('front/audio/lastnightonearth.mp3')}}" type="audio/mp3">
                      {{-- <source src="https://dl.dropbox.com/s/75jpngrgnavyu7f/The-Noisy-Freaks.ogg?dl=1" type="audio/ogg"> --}}
                  </audio>
                  <div style="display: flex">
                      <div class="time">
                          <p id="timer">0:00</p>
                      </div>
                      <div id="slider">
                          <div id="elapsed"></div>
                      </div>
                      <div class="time">
                          <p>0:00</p>
                      </div>
                  </div>
              </div>
          </li>
      </ul>
  </div>
  </body>
</html>

<script>
      // player
    var music = document.getElementById("music");
    var playButton = document.getElementById("play");
    var pauseButton = document.getElementById("pause");
    var playhead = document.getElementById("elapsed");
    var timeline = document.getElementById("slider");
    var timer = document.getElementById("timer");
    var duration;
    pauseButton.style.visibility = "hidden";

    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
    music.addEventListener("timeupdate", timeUpdate, false);

    function timeUpdate() {
        var playPercent = timelineWidth * (music.currentTime / duration);
        playhead.style.width = playPercent + "px";
        var secondsIn = Math.floor(((music.currentTime / duration) / 3.5) * 100);
        if (secondsIn <= 9) {
            timer.innerHTML = "0:0" + secondsIn;
        } else {
            timer.innerHTML = "0:" + secondsIn;
        }
    }
    document.querySelector("#tr").addEventListener("click", function() {
      var currentvalue = document.getElementById("tr").value;
        if(currentvalue == "Off"){
          music.play();
        document.getElementById("tr").value="On";
        }else{
          music.pause();
          document.getElementById("tr").value="Off";
        }
    });

    playButton.onclick = function() {
        music.play();
        playButton.style.visibility = "hidden";
        pause.style.visibility = "visible";
    }
    pauseButton.onclick = function() {
        music.pause();
        playButton.style.visibility = "visible";
        pause.style.visibility = "hidden";
    }
    music.addEventListener("canplaythrough", function() {
        duration = music.duration;
    }, false);

    
</script>
