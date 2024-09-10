<!-- Top header START -->
<div class="navbar-top navbar-dark bg-light d-none d-xl-block py-2 mx-2 mx-md-4 rounded-bottom-4">
    <div class="container">
        <div class="d-lg-flex justify-content-lg-between align-items-center">
            <!-- Navbar top Left-->
            <!-- Top info -->
            <ul class="nav align-items-center justify-content-center">
                <li class="nav-item me-3" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="bottom" data-bs-original-title="Sunday CLOSED">
                    <span><i class="fa fa-home me-2"></i>Address: {{ company()->address }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-headset me-2"></i>Call us now: {{ company()->phone_primary }}</a>
                </li>
            </ul>

            <!-- Navbar top Right-->
            <div class="nav d-flex align-items-center justify-content-center">
                <!-- Language -->
                <div class="dropdown me-3">
                    <a class="nav-link" href="#" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe me-2"></i>English</a>
                    {{--                    <div class="dropdown-menu mt-2 min-w-auto shadow" aria-labelledby="dropdownLanguage">--}}
                    {{--                        <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="{{ asset('frontend-1/assets/images/flags/uk.svg') }}" alt="">English</a>--}}
                    {{--                        <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="{{ asset('frontend-1/assets/images/flags/sp.svg') }}" alt="">Español</a>--}}
                    {{--                        <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="{{ asset('frontend-1/assets/images/flags/fr.svg') }}" alt="">Français</a>--}}
                    {{--                        <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="{{ asset('frontend-1/assets/images/flags/gr.svg') }}" alt="">Deutsch</a>--}}
                    {{--                    </div>--}}
                </div>

                <!-- Top social -->
                <ul class="list-unstyled d-flex mb-0">
                    <li> <a class="px-2 nav-link" href="http://{{ company()->facebook_page_link }}"><i class="fab fa-facebook"></i></a> </li>
                    <li> <a class="px-2 nav-link" href="http://{{ company()->instagram_link }}"><i class="fab fa-instagram"></i></a> </li>
                    <li> <a class="px-2 nav-link" href="http://{{ company()->twitter_link }}"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a class="ps-2 nav-link" href="http://{{ company()->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Top header END -->

<!-- Header START -->
<header class="navbar-light header-static navbar-sticky">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand me-0" href="/">
                <img class="light-mode-item navbar-brand-item" src="{{ asset(company()->logo) }}" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{ asset(company()->logo) }}" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse collapse" id="navbarCollapse">

                <!-- Nav Search END -->
                <ul class="navbar-nav navbar-nav-scroll mx-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="/" id="demoMenu">Home</a>
                    </li>

                    <!-- Nav item 2 Pages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Education</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <li> <a class="dropdown-item" href="/course-frontend"><i class="fas fa-fw fa-book me-1"></i>Courses</a></li>
                        </ul>
                    </li>

                    <!-- Nav item Settings -->
                    {{--                    @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))--}}
                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LMS</a>--}}
                    {{--                        <ul class="dropdown-menu" style="border: 1px solid greenyellow;" aria-labelledby="accounntMenu">--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('course.index') }}"><i class="fas fa-fw fa-book me-1"></i>Courses</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('course-category.index') }}"><i class="fas fa-fw fa-clipboard-list me-1"></i>Courses Category</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('course-level.index') }}"><i class="fas fa-fw fa-level-up-alt me-1"></i>Courses Level</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('students.index') }}"><i class="fas fa-fw fa-graduation-cap me-1"></i>Students</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('exams.index') }}"><i class="fas fa-fw fa-list me-1"></i>Exams</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('student-exam-enrollments.index') }}"><i class="fas fa-fw fa-list me-1"></i>Exam Paper</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('quiz.index') }}"><i class="fas fa-fw fa-list me-1"></i>Quiz</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))--}}
                    {{--                                <li> <a class="dropdown-item" href="/my-courses"><i class="fas fa-fw fa-list-alt me-1"></i>My Courses</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('student-exams.index') }}"><i class="fas fa-fw fa-edit me-1"></i>My Exams</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('student-quiz.index') }}"><i class="fas fa-fw fa-edit me-1"></i>My Quiz</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('student-exam-enrollments.index') }}"><i class="fas fa-fw fa-list me-1"></i>Exam Result Sheet</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                            @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))--}}
                    {{--                                <li> <a class="dropdown-item" href="{{ route('student-quiz-enrollments.index') }}"><i class="fas fa-fw fa-list me-1"></i>Quiz Result Sheet</a> </li>--}}
                    {{--                            @endif--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                @endif--}}

                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(auth()->user()->role->id == 1 || auth()->user()->role->id == 2)
                            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    @endif
                @endif

                <!-- Nav item 4 Component-->
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

                </ul>
            </div>
            <!-- Main navbar END -->

            <!-- Nav Search START -->
            <div class="nav nav-item dropdown nav-search px-1 px-lg-3">
                <a class="nav-link" role="button" href="#" id="navSearch" data-bs-toggle="dropdown" aria-expanded="true" data-bs-auto-close="outside" data-bs-display="static">
                    <i class="bi bi-search fs-4"> </i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch" data-bs-popper="none">
                    <form class="input-group" action="{{ route('search') }}" method="post">
                        @csrf
                        <input class="form-control border-primary" type="search" name="search" id="search" oninput="liveSearchAutofill(this.value)" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-primary m-0" type="submit">Search</button>
                    </form>
                    <div id="autofill"></div>

                    <!-- Recent search -->
                    <ul class="list-group list-group-borderless p-2 small">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Recent Searches:</span>
                            {{--                                <button type="submit" class="btn btn-sm btn-link mb-0 px-0">Clear all</button>--}}
                        </li>
                        @foreach(['recent1', 'recent2', 'recent3', 'recent4'] as $key)
                            @if(Illuminate\Support\Facades\Cache::has($key))
                                <li class="list-group-item text-primary-hover text-truncate">
                                    <a href="javascript:void(0)" class="text-body">
                                        <i class="far fa-clock me-1"></i>{{ Illuminate\Support\Facades\Cache::get($key) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            </div>
            <!-- Nav Search END -->

            @auth
                <div class="nav nav-item dropdown nav-search px-1 px-lg-3">
                    <button class="sign-out-button-style-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            </div>
                        </div>
                        <span>Sign Out</span>
                    </button>
                </div>
            @else
                <div class="nav nav-item dropdown nav-search px-1 px-lg-3">
                    <button class="sign-in-button-style-1" onclick="window.location.href='{{ route('sign-in.index') }}'">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                            </div>
                        </div>
                        <span>Sign In</span>
                    </button>
                </div>
        @endauth

        <!-- Profile START -->
            <div class="dropdown ms-1 ms-lg-0">
                <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-circle" src="{{ asset(auth()->user()->image ?? 'frontend-1/assets/images/default-image.jpg') }}" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                @auth
                    <!-- Profile info -->
                        <li class="px-3 mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="avatar-img rounded-circle shadow" src="{{ asset(auth()->user()->image ?? 'frontend-1/assets/images/default-image.jpg') }}" alt="avatar">
                                </div>
                                <div>
                                    <a class="h6" href="#">{{ authenticUserName() }}</a>
                                    <p class="small m-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li> <hr class="dropdown-divider"></li>
                        <!-- Links -->
                        @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Course Creator', 'Parent']))
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house fa-fw me-2"></i>Dashboard</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/user-profile-show/@if(\Illuminate\Support\Facades\Auth::check()){{ auth()->user()->id }}@endif"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" style="color: #b84145;"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-power fa-fw me-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form></li>
                    @else
                        <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('sign-in.index') }}"><i class="bi bi-power fa-fw me-2"></i>Sign In</a></li>
                        <li> <hr class="dropdown-divider"></li>
                        <!-- Dark mode options START -->
                        <li>
                            <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                                <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                        <use href="#"></use>
                                    </svg> Light
                                </button>
                                <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                        <use href="#"></use>
                                    </svg> Dark
                                </button>
                                <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                        <use href="#"></use>
                                    </svg> Auto
                                </button>
                            </div>
                        </li>
                @endauth
                <!-- Dark mode options END-->
                </ul>
            </div>
            <!-- Profile START -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
<!-- Header END -->
