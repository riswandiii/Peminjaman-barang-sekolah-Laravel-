{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="img/logo.png" width="70" alt="" data-aos="flip-left" data-aos-duration="2000">  SMKN 1 TAKALAR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('sarana dan prasarana') ? 'active' : '' }}" aria-current="page" href="/sarana dan prasarana">Sarana dan Prasarana</a>
          </li>

          @auth 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-lines-fill"></i> Welcome, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              @can('admin')
              <li><a class="dropdown-item" href="/dashboard">Dashboard Admin</a></li>
              @endcan
              <li><a class="dropdown-item" href="/history/{{ auth()->user()->id }}">Peminjaman</a></li>
              <li><a class="dropdown-item" href="/contact">Contact Us</a></li>
              <li><a class="dropdown-item" href="/profil/{{ auth()->user()->id }}"><i class="bi bi-person-lines-fill"></i> My Profil</a></li>
              <li><hr class="dropdown-divider"></li>
              {{-- Form Logout --}}
              <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item" onclick="return confirm('sure want to go out?')"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
              </form>
              {{-- End From --}}
            </ul>
          </li>
          @else 
          <li class="nav-item">
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
          
        </ul>
      </div>
    </div>
  </nav>
{{-- End Navbar --}}