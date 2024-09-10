<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <div class="pcoded-navigatio-lavel">Web Settings</div>
            <li>
                <a href="{{ route('dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home text-info"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>

{{--            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>--}}
{{--                    <span class="pcoded-mtext">Company</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('company.create') }}">--}}
{{--                            <span class="pcoded-mtext">Create</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('company.index') }}">--}}
{{--                            <span class="pcoded-mtext">List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))
                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager']))
                <li dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('site-configuration.edit', 1) }}">
                        <span class="pcoded-micon"><i class="feather icon-settings text-pink"></i></span>
                        <span class="pcoded-mtext">Site Configuration</span>
                    </a>
                </li>

            <li dropdown-icon="style1" subitem-icon="style1">
                <a href="{{ route('banners.edit', 1) }}">
                    <span class="pcoded-micon"><i class="feather icon-settings text-pink"></i></span>
                    <span class="pcoded-mtext">Banner Configuration</span>
                </a>
            </li>

            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-sliders text-warning"></i></span>
                    <span class="pcoded-mtext">Sliders</span>
{{--                    <span class="pcoded-badge label label-warning">{{ partnerCount() }}</span>--}}
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('sliders.create') }}">
                            <span class="pcoded-mtext">Create</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sliders.index') }}">
                            <span class="pcoded-mtext">List</span>
                        </a>
                    </li>
                </ul>
            </li>

                @endif
            @endif

            <div class="pcoded-navigatio-lavel">LMS</div>
            @include('backend.partials.sidebars.lms-sidebar')

            @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))
                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager']))
            <div class="pcoded-navigatio-lavel">miscellaneous</div>
            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-package text-warning"></i></span>
                    <span class="pcoded-mtext">Partners</span>
                    <span class="pcoded-badge label label-warning">{{ partnerCount() }}</span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('partners.create') }}">
                            <span class="pcoded-mtext">Create</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partners.index') }}">
                            <span class="pcoded-mtext">List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-package text-warning"></i></span>
                    <span class="pcoded-mtext">Visitor</span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('visitors.index') }}">
                            <span class="pcoded-mtext">List</span>
                        </a>
                    </li>
                </ul>
            </li>

                @endif
            @endif

            @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))
                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Teacher']))
            <div class="pcoded-navigatio-lavel">Administration</div>

                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-sidebar text-primary"></i></span>
                        <span class="pcoded-mtext">Role</span>
                        <span class="pcoded-badge label label-primary">{{ roleCount() }}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="{{ route('role.create') }}">
                                <span class="pcoded-mtext">Create</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('role.index') }}">
                                <span class="pcoded-mtext">List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-user text-primary"></i></span>
                        <span class="pcoded-mtext">User</span>
                        <span class="pcoded-badge label label-primary">{{ userCount() }}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="{{ route('user.create') }}">
                                <span class="pcoded-mtext">Create</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <span class="pcoded-mtext">List</span>
                            </a>
                        </li>
                    </ul>
                </li>

        </ul>
    </div>
    @endif
    @endif
</nav>
