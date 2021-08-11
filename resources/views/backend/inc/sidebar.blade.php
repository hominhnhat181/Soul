<div class="sidebar" data-color="white" data-background-color="black" data-image="{{ asset('/assets/back/img/sidebar-1.jpg') }}">
    <img src="">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo"><a href="{{Route('admin.dashboard')}}" class="simple-text logo-normal">
            Music Box
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/feature') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.feature.index')}}">
                    <i class="material-icons">star</i>
                    <p>Features</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/album') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.album.index')}}">
                    <i class="material-icons">album</i>
                    <p>Albums</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/genre') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.genre.index')}}">
                    <i class="material-icons">loyalty</i>
                    <p>Genres</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/track') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.track.index')}}">
                    <i class="material-icons">audiotrack</i>
                    <p>Tracks</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/artist') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.artist.index')}}">
                    <i class="material-icons">mic</i>
                    <p>Bands - Singles</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/notifications') ? 'active' : '' }}">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">settings</i>
                    <p>Setting</p>
                </a>
            </li>
        </ul>
    </div>
</div>
