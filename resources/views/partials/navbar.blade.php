<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="logo" style="height: 40px;">
            <span class="fs-5 fw-semibold">Career Training College</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}" onclick="showPage('home')">
                        <i class="fa-solid fa-house me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('about') }}" onclick="showPage('about')">
                        <i class="fa-solid fa-circle-info me-1"></i>About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('events.index') }}" onclick="showPage('event')">
                        <i class="fa-solid fa-calendar-days me-1"></i>Events
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->
