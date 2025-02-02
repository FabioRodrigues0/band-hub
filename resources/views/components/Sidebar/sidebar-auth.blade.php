@if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        @auth
            <x-Sidebar.sidebar-item 
                href="{{ route('dashboard') }}" 
                icon="user" 
                text="{{ Auth::user()->name }}" 
            />
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-Sidebar.sidebar-item 
                    href="{{ route('logout') }}"
                    icon="logout"
                    text="Log Out"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                />
            </form>
        @else
            <x-Sidebar.sidebar-item 
                href="{{ route('login') }}" 
                icon="login" 
                text="Log in" 
            />
            @if (Route::has('register'))
                <x-Sidebar.sidebar-item 
                    href="{{ route('register') }}" 
                    icon="user-plus" 
                    text="Sign up" 
                />
            @endif
        @endauth
    </nav>
@endif
