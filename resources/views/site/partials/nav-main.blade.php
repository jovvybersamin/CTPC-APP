{{-- @include('site.partials.sidebar') --}}

<nav class="navbar navbar-default navbar-static-top headroom headroom--pinned headroom--top" role="navigation">
      <div class="container">

        <div class="navbar-header">
              <a id="nav-toggle" href="#"><span></span></a>
              <a href="#" class="navbar-brand">
              <img src="/logo/logo.png"></img>
              </a>
        </div>
        <div class="collapse navbar-collapse right" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-left">
            <li class="active">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="dropdown">
            <a href="#" class="dropdown-toggle">Videos</a>
                <ul class="dropdown-menu multi-level" role="menu">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('video.category',$category['slug'])}}">
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
               </ul>
            </li>
            <li>
                <a href="{{ route('providers') }}">Discount Providers</a>
            </li>
            <li class="dropdown">
                <a href="{{ route('about') }}" class="dropdown-toggle">About</a>
            </li>
            <li class="dropdown">
                <a href="{{ route('contact') }}" class="dropdown-toggle">Contact</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
                <div id="navbar-search-form">
                    <form role="search" action="{{ route('search') }}" method="GET">
                        <i class="fa fa-search"></i>
                        <input type="text" id="search" name="q" placeholder="Search..." value="{{ old('q') }}">
                    </form>
                </div>
            </ul>

            </div>

         </div>


    </nav>
