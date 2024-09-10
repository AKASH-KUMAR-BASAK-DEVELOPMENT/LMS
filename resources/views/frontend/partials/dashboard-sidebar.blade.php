<div class="col-xl-3">
    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-3 p-xl-0">
            <div class="bg-dark border rounded-3 p-3 w-100">
                <div class="list-group list-group-dark list-group-borderless collapse-list">
                    <a class="list-group-item {{ Request::is(['student-dashboard', 'another-url']) ? 'active' : '' }}" href="/student-dashboard"><i class="bi bi-ui-checks-grid fa-fw text-success me-2"></i>Dashboard</a>
                    @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Manager', 'Student', 'Teacher', 'Parent', 'Course Creator']))
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('course.index') ? 'active' : '' }}" href="{{ route('course.index') }}"><i class="bi bi-window fa-fw text-primary me-2"></i>Courses</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('course-category.index') ? 'active' : '' }}" href="{{ route('course-category.index') }}"><i class="bi bi-list text-info fa-fw me-2"></i>Courses Category</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Admin', 'Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('course-level.index') ? 'active' : '' }}" href="{{ route('course-level.index') }}"><i class="bi bi-alexa text-purple fa-fw me-2"></i>Courses Level</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('students.index') ? 'active' : '' }}" href="{{ route('students.index') }}"><i class="bi bi-person-rolodex fa-fw text-success me-2"></i>Students</a>
                                @endif
                                    @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('exams.index') ? 'active' : '' }}" href="{{ route('exams.index') }}"><i class="bi bi-card-checklist fa-fw text-primary me-2"></i>Exams</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('student-exam-enrollments.index') ? 'active' : '' }}" href="{{ route('student-exam-enrollments.index') }}"><i class="bi bi-card-checklist text-info fa-fw me-2"></i>Exam Paper</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher', 'Course Creator']))
                                    <a class="list-group-item {{ Request::routeIs('quiz.index') ? 'active' : '' }}" href="{{ route('quiz.index') }}"><i class="bi bi-card-checklist text-primary fa-fw me-2"></i>Quiz</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
                                    <a class="list-group-item {{ Request::is(['my-courses', 'another-url']) ? 'active' : '' }}" href="/my-courses"><i class="bi bi-card-checklist text-warning fa-fw me-2"></i>My Courses</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
                                    <a class="list-group-item {{ Request::routeIs('student-exams.index') ? 'active' : '' }}" href="{{ route('student-exams.index') }}"><i class="bi bi-card-checklist fa-fw text-danger me-2"></i>My Exams</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student']))
                                    <a class="list-group-item {{ Request::routeIs('student-quiz.index') ? 'active' : '' }}" href="{{ route('student-quiz.index') }}"><i class="bi bi-card-checklist fa-fw text-warning me-2"></i>My Quiz</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))
                                    <a class="list-group-item {{ Request::routeIs('student-exam-enrollments.index') ? 'active' : '' }}" href="{{ route('student-exam-enrollments.index') }}"><i class="bi bi-card-checklist fa-fw text-info me-2"></i>Exam Result Sheet</a>
                                @endif
                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Parent']))
                                    <a class="list-group-item {{ Request::routeIs('student-quiz-enrollments.index') ? 'active' : '' }}" href="{{ route('student-quiz-enrollments.index') }}"><i class="bi bi-card-checklist fa-fw text-pink me-2"></i>Quiz Result Sheet</a>
                                @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
