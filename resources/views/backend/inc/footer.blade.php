<footer class="footer">
    <div class="container-fluid">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="https://creative-tim.com/presentation">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
    </div>
</footer>
<script>
    const x = new Date().getFullYear();
    let date = document.getElementById('date');
    date.innerHTML = '&copy; ' + x + date.innerHTML;
</script>


<link href="{{ asset('assets/back/css/material-dashboard.css') }}" rel="stylesheet" />
<script src="{{ asset('assets/back/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/back/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/back/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="{{ asset('assets/back/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chartist JS -->
<script src="{{ asset('assets/back/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/back/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/back/js/material-dashboard.js?v=2.1.0') }}"></script>

{{-- made --}}
<script src="{{ asset('assets/back/js/auth.js') }}"></script>

{{-- mutil chose (tag) --}}
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

{{-- cale --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
