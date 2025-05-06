<nav class="navbar navbar-expand-lg navbar-dark navbar-toko">
    <div class="container">
        <a class="navbar-brand navbar-brand-toko" href="{{ route('dashboard') }}">
            <i class="fas fa-book-open me-1"></i>TokoBuku
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-toko {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-home me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-toko {{ request()->routeIs('pengelolaan') ? 'active' : '' }}" href="{{ route('pengelolaan') }}">
                        <i class="fas fa-book me-1"></i> Kelola Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-toko {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                        <i class="fas fa-user me-1"></i> Profil
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                @if(request()->query('username'))
                    <li class="nav-item">
                        <span class="nav-link nav-link-toko">
                            <i class="fas fa-user me-1"></i> {{ request()->query('username') }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-toko" href="{{ route('login') }}">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link nav-link-toko" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>