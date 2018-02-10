<header id="fh5co-header" role="banner">
    <div class="container">
        <div class="header-inner">
            <h1><i class="sl-icon-home"></i><a href="{{ url('/') }}">MC Realty</a></h1>
            <nav role="navigation">
                <ul>

                    @if (Route::has('login'))
                        <li><a class="{{ request()->segment(1) === null ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                        <li><a class="{{ request()->segment(1) === 'project' ? 'active' : '' }}" href="{{ url('project') }}">Project</a></li>
                        <li><a class="{{ request()->segment(1) === 'contact' ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a></li>
                        <li><a class="{{ request()->segment(1) === 'news' ? 'active' : '' }}" href="{{ url('news') }}">News</a></li>
                        @auth
                            @if(Auth::user()->hasRole('admin'))
                                <li><a class="{{ request()->segment(1) === 'admin' ? 'active' : '' }}" href="{{ url('/admin') }}">Dashboard</a></li>
                            @else
                                <li><a class="{{ request()->segment(1) === 'home' ? 'active' : '' }}" href="{{ url('/home') }}">Dashboard</a></li>
                            @endif
                            <li><a class="{{ request()->segment(1) === 'property' ? 'active' : '' }}" href="{{ route('property.index') }}">Properties</a></li>
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