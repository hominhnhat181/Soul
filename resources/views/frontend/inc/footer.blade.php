

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


{{-- END FOOTER --}}


<!--   Core JS Files   -->
<link href="{{ asset('assets/front/css/material-dashboard.css') }}" rel="stylesheet" />

<script src="{{ asset('assets/front/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/front/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="{{ asset('assets/front/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chartist JS -->
<script src="{{ asset('assets/front/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/front/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/front/js/material-dashboard.js?v=2.1.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' +
                            new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $(
                        '.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                        'src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' +
                        new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }
                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }
                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }
                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }
                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });
        });
    });
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/front/js/demos.js
        md.initDashboardPageCharts();
    });
</script>
