    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon" data-feather="menu">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                {{-- <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon">
                        </i>
                    </a>
                </li> --}}
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span
                                class="user-name fw-bolder">{{ auth()->user() ? auth()->user()->name : auth()->user()->email }}</span>
                            <span class="user-status">{{ auth()->user()->role }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round"
                                src="{{ auth()->user() && auth()->user()->avatar != NULL ? auth()->user()->avatar : '/img/user.png' }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online">
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href='{{ route('user.edit') }}'>
                            <i class="me-50" data-feather="user">
                            </i> Profile
                        </a>
                        <div class="dropdown-divider">
                        </div>
                        <form action="/admin/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item w-100">
                                <i class="me-50" data-feather="power">
                                </i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
