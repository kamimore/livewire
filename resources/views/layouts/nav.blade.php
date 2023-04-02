<nav class="navbar navbar-expand-lg  sticky-top navbar-dark bg-dark px-4 text-uppercase">
    <a class="navbar-brand" href="{{ route('home') }}">Livewire</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-md-flex align-items-lg-center justify-content-lg-end " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item mx-2 active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            @auth
                <livewire:logout />
            @endauth
            {{-- @if (auth()->check()) --}}
            @guest
                <li class="nav-item  mx-2">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item  mx-2">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                {{-- @endif --}}
            @endguest
        </ul>
    </div>
</nav>
