<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-1"><img src="/img/health.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="index.html">Klinik Sehat</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#departments">Kategori Dokter</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Cari Dokter</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          @auth
          <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="{{ route('profile.edit') }}" class="d-block"><i class="bi bi-person"></i> Profile</a>
              </li>
              <li>
                <a class="d-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="bi bi-power">
                        </i> Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          @else
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Masuk</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @auth
          <a href="" class="appointment-btn scrollto"><span class="d-none d-md-inline">Buat</span> Janji Temu</a>
      @else
          <a href="{{ route('register') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Buat</span> Akun</a>
      @endauth
      {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Buat</span> Janji Temu</a> --}}

    </div>
  </header><!-- End Header -->
