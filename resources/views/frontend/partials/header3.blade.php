<header class="header header-one">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="container">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                    </a>
                    <a href="/" class="navbar-brand logo">
                        <img src="{{ asset(company()->logo) }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="/" class="menu-logo">
                            <img src="{{ asset(company()->logo) }}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li class="megamenu active">
                            <a href="/">Home</a>
                        </li>
                        <li class="has-submenu ">
                            <a href>Education <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class=" "><a href="{{ route('course-frontend') }}">Course</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" target="_blank">Dashboard</a>
                        </li>
                            <li class="login-link">
                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                </a>
                            </li>
                        @else
                            <li class="login-link">
                                <a href="/sign-in">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>

                    @auth
                    <ul class="nav">

                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                                <span class="user-img">
                                <img class="rounded-circle" src="{{ asset(auth()->user()->image ?? 'files/assets/images/default-image.jpg') }}" width="31">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="{{ asset(auth()->user()->image ?? 'files/assets/images/default-image.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6 class="text-info">{{ auth()->user()->name }}</h6>
                                        <p class="text-muted mb-0">{{ auth()->user()->role->name }}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                <a class="dropdown-item" href="/user-profile-show/{{ auth()->user()->id }}">Profile Settings</a>
                                <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                    @else
                    <ul class="nav header-navbar-rht">
                        <li class="nav-item">
                            <a class="nav-link header-login" href="/sign-up-form"><img src="{{ asset('mentoring-frontend/assets/img/icon/sign-icon.svg') }}"
                                                                                       alt> Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sign-in"> <img src="{{ asset('mentoring-frontend/assets/img/icon/log-icon.svg') }}" alt> Log In</a>
                        </li>
                    </ul>
                    @endauth

            </div>
        </nav>
    </div>
</header>
