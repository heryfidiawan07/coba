<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header navbar-left">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'fidawa') }}
            </a>
            
        </div>
        
        <li class="nav navbar-nav navbar-left" style="margin-top: 10px; margin-right: 1px; margin-left: 1px;">
            <form class="form-inline" action="/search" method="get">
                <input name="search" class="form-control input-sm" type="text" placeholder="Search">
                <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
            </form>
        </li>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="/threads">forum</a></li>
                <li><a href="/fjb">fjb</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">login</a></li>
                    <li><a href="{{ url('/register') }}">register</a></li>
                @else
                    <li><a href="/fjb/create">tulis di fjb</a></li>
                    <li><a href="/threads/create">tulis di forum</a></li>
                    <li><a href="/">home</a></li>
                    @if(Auth::user()->isAdmin())
                        <li><a href="/admin">admin</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/{{Auth::user()->name}}" style="margin-top: -10px; margin-bottom: -10px;">
                            <img src=" {{Auth::user()->getAvatar()}} " alt="{{Auth::user()->name}}" class="media-object img-circle" onerror="this.style.display='none'">
                            <img src="{{asset('/img/users/'.Auth::user()->getAvatar() )}}" alt="{{Auth::user()->name}}" class="media-object img-circle" onerror="this.style.display='none'">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>