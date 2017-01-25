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
                <img style="height: 35px; margin-top: -8px;" src="/fidawa.png">
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
                
                <li><a href="/threads"><img id="icon" src="/background/forumc.svg"> Forum</a></li>
                <li><a href="/fjb"><img id="icon" src="/background/shopc.svg"> Jual Beli</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><img id="icon" src="/background/login.svg"> Login</a></li>
                    <li><a href="{{ url('/register') }}"><img id="icon" src="/background/register.svg"> Register</a></li>
                @else
                    <li><a href="/threads/create"><img id="icon" src="/background/createc.svg"> Tulis di forum</a></li>
                    <li><a href="/fjb/create"><img id="icon" src="/background/createc.svg"> Pasang iklan</a></li>
                    <li><a href="/"><img id="icon" src="/background/homec.svg"> Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="margin-top: 10px;">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <img id="icon" src="/background/logout.svg"> Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                            <li><a href="/{{ Auth::user()->name }}"><img id="icon" src="/background/profil.svg"> Profil</a></li>
                            @if(Auth::user()->isAdmin())
                                <li><a href="/admin"><img id="icon" src="/background/admin.svg"> Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="/{{Auth::user()->name}}" style="margin-top: -10px; margin-bottom: -10px;">
                        @if(Auth::user()->img == null)
                            <img src=" {{Auth::user()->getAvatar()}}" class="media-object img-circle">
                        @else
                            <img src="{{asset('/img/users/'.Auth::user()->getAvatar() )}}" class="media-object img-circle">
                        @endif
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>