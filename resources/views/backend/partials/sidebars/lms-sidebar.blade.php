<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>
        <span class="pcoded-mtext">Course Category</span>
    </a>
    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('course-category.create') }}">
                <span class="pcoded-mtext">Create</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard-course-category.index') }}">
                <span class="pcoded-mtext">List</span>
            </a>
        </li>
    </ul>
</li>
<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>
        <span class="pcoded-mtext">Course Level</span>
    </a>
    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('course-level.create') }}">
                <span class="pcoded-mtext">Create</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard-course-level.index') }}">
                <span class="pcoded-mtext">List</span>
            </a>
        </li>
    </ul>
</li>
<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-book text-success"></i></span>
        <span class="pcoded-mtext">Course</span>
        <span class="pcoded-badge label label-success">{{ courseCount() }}</span>
    </a>
    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('course.create') }}">
                <span class="pcoded-mtext">Create</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard-course.index') }}">
                <span class="pcoded-mtext">List</span>
            </a>
        </li>
    </ul>
</li>
<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-file text-info"></i></span>
        <span class="pcoded-mtext">Enrollment</span>
        <span class="pcoded-badge label label-info">{{ studentEnrollmentCount() }}</span>
    </a>
    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('dashboard-student-enrollments.index') }}">
                <span class="pcoded-mtext">Total Enrollments</span>
            </a>
        </li>
    </ul>
</li>
<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-edit text-danger"></i></span>
        <span class="pcoded-mtext">Exam</span>
        <span class="pcoded-badge label label-danger">{{ examCount() }}</span>
    </a>
    <ul class="pcoded-submenu">
        <li>
            <a href="{{ route('exams.create') }}">
                <span class="pcoded-mtext">Create</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard-exam.index') }}">
                <span class="pcoded-mtext">List</span>
            </a>
        </li>
    </ul>
</li>
