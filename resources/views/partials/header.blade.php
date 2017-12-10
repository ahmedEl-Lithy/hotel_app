<header>
    <nav>
        <ul>
            @if(!Auth::check())
                <li><a href="{{ route('signup') }}">Sign Up</a></li>
                <li><a href="{{ route('signin') }}">Sign In</a></li>
            @else
                <li><a href="{{ route('home') }}">Main Page</a></li>
                @if(Auth::user()->roles->contains('name', 'Admin'))
                    <li><a href="{{ route('dashboard') }}">Admin Panel</a></li>
                    <span id="separator"></span>

                @elseif(Auth::user()->roles->contains('name', 'User'))
                    <li><a href="{{ route('clients') }}">Clients</a></li>
                    <li><a href="{{ route('profile', ['client_id' => Auth::user()->id ]) }}">Profile</a></li>
                    <span id="separator"></span>
                @endif
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endif
        </ul>
    </nav>
</header>