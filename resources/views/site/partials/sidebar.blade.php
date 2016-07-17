<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ route('home') }}">
               CTPC.TV
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('about') }}"><i class="fa fa-info" aria-hidden="true"></i> About</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Events</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-video-camera" aria-hidden="true"></i>
            Videos
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Category</li>
            <li><a href="#">Health</a></li>
            <li><a href="#">Sports</a></li>
            <li><a href="#">Resorts</a></li>
            <li><a href="#">Malls</a></li>
            <li><a href="#">Restaurant</a></li>
          </ul>
        </li>
        <li>
            <a href="{{ route('services') }}"><i class="fa fa-globe" aria-hidden="true"></i> Services</a>
        </li>
        <li>
            <a href="{{ route('contact') }}"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
        </li>
        <li>
            <a href="https://twitter.com/maridlcrmn"><i class="fa fa-users" aria-hidden="true"></i> Follow me</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->
