<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#">
                    <span class="brand-logo">
                        <img src="/assets/img/logo-jfls.png" alt="">
                    </span>
                    <h2 class="brand-text text-black">Klinik Sehat</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('admin') ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="/admin"><i data-feather="home"></i>
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/news/*') || request()->is('admin/news') ? 'active' : '' }} nav-item"><a
                    class="d-flex align-items-center" href="/admin/news"><i data-feather="file-text"></i><span
                        class="menu-title text-truncate">Doctor Category</span></a>
            </li>
            <li
                class="{{ request()->is('admin/menu/*') || request()->is('admin/menu') ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="/admin/menu"><i data-feather='menu'></i><span
                        class="menu-title text-truncate">Doctor</span></a>
            </li>
            <li class="{{ request()->is('admin/pages/*') || request()->is('admin/pages') ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="/admin/pages"><i data-feather='layers'></i><span
                        class="menu-title text-truncate">Doctor Schedule</span></a>
            </li>
            <li
                class="{{ request()->is('admin/testimony/*') || request()->is('admin/testimony') ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="/admin/testimony"><i data-feather='twitch'></i><span
                        class="menu-title text-truncate">Patient</span></a>
            </li>
            <li
                class="{{ request()->is('admin/galleries/*') || request()->is('admin/galleries') ? 'active' : '' }} nav-item">
                <a class="d-flex align-items-center" href="/admin/galleries"><i data-feather='camera'></i><span
                        class="menu-title text-truncate">Appointment Schedule</span></a>
            </li>
            @if (Auth::user()['role'] == 'Admin')
                <li class="{{ request()->is('admin/users') ? 'active' : '' }} nav-item"><a
                        class="d-flex align-items-center" href="/admin/users"><i data-feather='users'></i><span
                            class="menu-title text-truncate">Users</span></a>
                </li>
            @endif
        </ul>
    </div>
</div>
