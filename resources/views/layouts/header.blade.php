<style>
    .navbar-light {
        border: none;
        background: white;
    }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light mt-2" id="mainNavbarId">
     <!-- Authentication Links -->
     @guest
        <ul class="navbar-nav">
        @if (Route::has('login'))
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        </ul>
    @else

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/Views') }}" class="nav-link active">Home</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/gallery') }}" class="nav-link active">Galeries</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/posts') }}" class="nav-link active">Impressions</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    @endguest
</nav>

<script>
    function toggleSidebar() { 
        document.getElementById("customSidebar").style.width = "250px";
        document.getElementById("mainBody").style.marginLeft = "250px";
    }
</script>
<!-- /.navbar -->