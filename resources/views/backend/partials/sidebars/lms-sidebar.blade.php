{{--<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">--}}
{{--    <a href="javascript:void(0)">--}}
{{--        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>--}}
{{--        <span class="pcoded-mtext">Course Category</span>--}}
{{--    </a>--}}
{{--    <ul class="pcoded-submenu">--}}
{{--        <li>--}}
{{--            <a href="{{ route('course-category.create') }}">--}}
{{--                <span class="pcoded-mtext">Create</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('dashboard-course-category.index') }}">--}}
{{--                <span class="pcoded-mtext">List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">--}}
{{--    <a href="javascript:void(0)">--}}
{{--        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>--}}
{{--        <span class="pcoded-mtext">Course Level</span>--}}
{{--    </a>--}}
{{--    <ul class="pcoded-submenu">--}}
{{--        <li>--}}
{{--            <a href="{{ route('course-level.create') }}">--}}
{{--                <span class="pcoded-mtext">Create</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('dashboard-course-level.index') }}">--}}
{{--                <span class="pcoded-mtext">List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">--}}
{{--    <a href="javascript:void(0)">--}}
{{--        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>--}}
{{--        <span class="pcoded-mtext">Course</span>--}}
{{--        <span class="pcoded-badge label label-success">{{ courseCount() }}</span>--}}
{{--    </a>--}}
{{--    <ul class="pcoded-submenu">--}}
{{--        <li>--}}
{{--            <a href="{{ route('course.create') }}">--}}
{{--                <span class="pcoded-mtext">Create</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('dashboard-course.index') }}">--}}
{{--                <span class="pcoded-mtext">List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}

{{--<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">--}}
{{--    <a href="javascript:void(0)">--}}
{{--        <span class="pcoded-micon"><i class="feather icon-edit text-danger"></i></span>--}}
{{--        <span class="pcoded-mtext">Exam</span>--}}
{{--        <span class="pcoded-badge label label-danger">{{ examCount() }}</span>--}}
{{--    </a>--}}
{{--    <ul class="pcoded-submenu">--}}
{{--        <li>--}}
{{--            <a href="{{ route('exams.create') }}">--}}
{{--                <span class="pcoded-mtext">Create</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('dashboard-exam.index') }}">--}}
{{--                <span class="pcoded-mtext">List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}



@if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Enrollment</span>
                <span class="pcoded-badge label label-info">{{ studentEnrollmentCount() }}</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('dashboard-student-enrollments.index') }}">
                        <span class="pcoded-mtext">Index</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard-student-enrollments.create') }}">
                        <span class="pcoded-mtext">Create</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Courses</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('course.create') }}">
                        <span class="pcoded-mtext">Create</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Courses Category</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('course-category.create') }}">
                        <span class="pcoded-mtext">Create</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course-category.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Courses Level</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('course-level.create') }}">
                        <span class="pcoded-mtext">Create</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course-level.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Students</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('students.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Exams</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('exams.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Exam Paper</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-exam-enrollments.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Quiz</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('quiz.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Quiz Paper</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-quiz-enrollments.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">My Courses</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="/my-courses">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">My Exams</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-exams.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">My Quiz</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-quiz.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Exam Result Sheet</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-exam-enrollments.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
                <span class="pcoded-mtext">Quiz Result Sheet</span>
            </a>
            <ul class="pcoded-submenu">
                <li>
                    <a href="{{ route('student-quiz-enrollments.index') }}">
                        <span class="pcoded-mtext">List</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager']))
        <li dropdown-icon="style1" subitem-icon="style1">
            <a href="{{ route('lms-settings.index') }}">
                <span class="pcoded-micon"><i class="feather icon-settings text-pink"></i></span>
                <span class="pcoded-mtext">LMS Settings</span>
            </a>
        </li>
    @endif
@endif
