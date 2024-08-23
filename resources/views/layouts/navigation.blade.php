<nav class="navbar navbar-dark fixed-top navbar-expand-lg bg-dark">

    <div class="container-fluid">

        <div class="collapse navbar-collapse mx-5" id="navbarScroll">

            <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">
                <!-- Navigation Links -->
                <li class="nav-item">
                    <a class="nav-link text-melt climate-crisis-1979 fs-3" href="{{ route('dashboard') }}">ECO-TRADE</a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center ms-auto my-2 my-lg-0 navbar-nav-scroll text-light">
                @if (auth()->check()) <!-- Check if user is authenticated -->
                    <li class="nav-item">
                        @if (auth()->user()->hasRole('admin'))
                            <a class="nav-link" href="{{ route('admin.items.index') }}">All Items</a>
                        @elseif(auth()->user()->hasRole('user'))
                            <a class="nav-link" href="{{ route('user.items.index') }}">All Items</a>
                        @else
                            <a class="nav-link" href="{{ route('centers.index') }}">All Items</a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if (auth()->user()->hasRole('admin'))
                            <a class="nav-link" href="{{ route('admin.centers.index') }}">All Centers</a>
                        @elseif(auth()->user()->hasRole('user'))
                            <a class="nav-link" href="{{ route('user.centers.index') }}">All Centers</a>
                        @else
                            <a class="nav-link" href="{{ route('centers.index') }}">All Centers</a>
                        @endif
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link border-0 shadow-none" href="#" role="button" data-bs-toggle="dropdown">
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu border-0 bg-dark">
                            <li>
                                <a class="dropdown-item rounded" href="{{ route('profile.edit') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item rounded" 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- If the user is not authenticated -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
