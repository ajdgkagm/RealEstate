<header id="fh5co-header" role="banner">
    <div class="container">
        <div class="header-inner">
            <h1><i class="sl-icon-home"></i><a href="{{ url('/') }}">MC Realty</a></h1>
            <nav role="navigation">
                <ul>

                    @if (Route::has('login'))
                        <li><a class="{{ request()->segment(1) === null ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                        <li><a class="{{ request()->segment(1) === 'project' ? 'active' : '' }}" href="{{ url('project') }}">Project</a></li>
                        <li><a class="{{ request()->segment(1) === 'about' ? 'active' : '' }}" href="{{ url('about') }}">About</a></li>
                        {{--<li><a class="{{ request()->segment(1) === 'contact' ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a></li>--}}
                        {{--<li><a class="{{ request()->segment(1) === 'news' ? 'active' : '' }}" href="{{ url('news') }}">News</a></li>--}}
                        @auth
                            @if(Auth::user()->hasRole('admin'))
                                <li><a class="{{ request()->segment(1) === 'admin' ? 'active' : '' }}" href="{{ url('/admin') }}">Dashboard</a></li>
                            @else
                                <li><a class="{{ request()->segment(1) === 'home' ? 'active' : '' }}" href="{{ url('/home') }}">Profile</a></li>
                            @endif
                            <li><a class="{{ request()->segment(1) === 'property' ? 'active' : '' }}" href="{{ route('property.index') }}">Properties</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" >
{{--                                        <li>
                                            <a href="{{ route( Auth::user()->hasRole('admin') ? 'admin.home' : 'user.home' ) }}">Home</a>
                                        </li>--}}
                                        <li style="width: 100%">
                                            <a class="text-center" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Sign Out
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @else
                            <li><a class="{{ request()->segment(1) === 'property' ? 'active' : '' }}" href="{{ route('property.index') }}">Properties</a></li>
                            <li><a class="{{ request()->segment(1) === 'login' ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                            <li><a class="{{ request()->segment(1) === 'register' ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</header>