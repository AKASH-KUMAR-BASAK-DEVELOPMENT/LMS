@extends('frontend-1.layout.app')
@section('content')

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12">
                        <div style="margin-left: 0 !important;">
                            <div class="page-content-wrapper border rounded">
                                <div class="row m-2">
                                    {{--                    <div class="col-12 d-sm-flex justify-content-between align-items-center">--}}
                                    {{--                        <h1 class="h3 mb-2 mb-sm-0">Exam Enrolments</h1>--}}
                                    {{--                        <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary mb-0">Create a exams</a>--}}
                                    {{--                    </div>--}}
                                </div>
                                <div class="card bg-transparent">
                                    <div class="card-body">
                                        <div class="table-responsive border-0 rounded-3">
                                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 rounded-start">#</th>
                                                    <th scope="col" class="border-0">Exam</th>
                                                    <th scope="col" class="border-0">Student</th>
                                                    <th scope="col" class="border-0">Date</th>
                                                    <th scope="col" class="border-0">Result</th>
                                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @forelse($studentExamEnrollments as $studentExamEnrollment)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center position-relative">
                                                                <div class="w-60px">
                                                                    <img src="{{ asset($studentExamEnrollment->exam->course->image ?? 'frontend-1/assets/images/exam-default-image.png') }}" class="rounded" alt="">
                                                                </div>
                                                                <h6 class="table-responsive-title mb-0 ms-2">
                                                                    {{ $studentExamEnrollment->exam->name }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>{{ $studentExamEnrollment->user->name }}</td>
                                                        <td>{{ $studentExamEnrollment->created_at }}</td>
                                                        <td>
                                                            @if(sizeof($studentExamEnrollment->studentExamAnswerSheets) == sizeof($studentExamEnrollment->studentExamAnswerSheetsMarked))
                                                                <span class="badge text-success">Published</span>
                                                            @else
                                                                <span class="badge text-danger">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Teacher', 'Parent', 'Course Creator']))
                                                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Teacher',]))
                                                                    <a href="{{ route('student-exam-answer-sheet.show', $studentExamEnrollment->id) }}" class="btn btn-sm btn-success-soft me-1 mb-1 mb-md-0" title="Exam Paper">Exam Paper</a>
                                                                    @if($studentExamEnrollment->retake_request == 1)
                                                                        <a href="student-exam-retake-request-accept/{{  $studentExamEnrollment->id }}" class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0" title="Click for approve retake request">Retake Request</a>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(sizeof($studentExamEnrollment->studentExamAnswerSheets) == sizeof($studentExamEnrollment->studentExamAnswerSheetsMarked))
                                                                <a href="/student-exam-answer-sheet-student-result/{{ $studentExamEnrollment->id }}" class="btn btn-sm btn-success-soft me-1 mb-1 mb-md-0" title="Result Card">Result Card</a>
                                                            @endif
                                                            @if(\Illuminate\Support\Facades\Auth::check() && in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student', 'Teacher', 'Parent', 'Course Creator']))
                                                                @if(in_array(Illuminate\Support\Facades\Auth::user()->role->name , ['Student',]))
                                                                    @if($studentExamEnrollment->retake_request == 0 && $studentExamEnrollment->is_retake == 0)
                                                                        <a href="student-exam-retake-request/{{ $studentExamEnrollment->id }}" class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0" title="Retake Request"><img class="height-width-25px" src="{{ asset('frontend-1/assets/images/restart.svg') }}"></a>
                                                                    @endif
                                                                    @if($studentExamEnrollment->retake_request == 1)
                                                                        <a class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0" title="Retake Request Pending">Pending Retake Request</a>
                                                                    @endif
                                                                    @if($studentExamEnrollment->is_retake == 1)
                                                                        <a class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0" title="Retake Request Accepted"><img class="height-width-25px" src="{{ asset('frontend-1/assets/images/request-accept.svg') }}"> </a>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No answer sheet available.</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent pt-0">
                                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                            <p class="mb-0 text-center text-sm-start">Showing {{ $studentExamEnrollments->firstItem() }} to {{ $studentExamEnrollments->lastItem() }} of {{ $studentExamEnrollments->total() }} entries</p>
                                            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                                <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                                    @if ($studentExamEnrollments->onFirstPage())
                                                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                    @else
                                                        <li class="page-item mb-0"><a class="page-link" href="{{ $studentExamEnrollments->previousPageUrl() }}" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                    @endif
                                                    @foreach ($studentExamEnrollments->getUrlRange(1, $studentExamEnrollments->lastPage()) as $page => $url)
                                                        <li class="page-item mb-0 {{ $page == $studentExamEnrollments->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                    @endforeach
                                                    @if ($studentExamEnrollments->hasMorePages())
                                                        <li class="page-item mb-0"><a class="page-link" href="{{ $studentExamEnrollments->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
                                                    @else
                                                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        function confirmAndSubmit() {
            if (confirm('Are you sure you want to delete this item?')) {
                const form = document.createElement('form');
                form.setAttribute('id', 'deleteForm');
                form.setAttribute('action', '{{ route('exams.destroy', $exam->id ?? 0 ) }}');
                form.setAttribute('method', 'POST');
                const csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                const methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
    <script>
        {!! session('request-success') ? 'showToast("Retake Request Send!", 5000, "rgba(13, 179, 13, 0.77)", "#fff");' : (session('accept-success') ? 'showToast("Accept Retake Request!", 5000, "rgba(13, 179, 13, 0.77)", "#fff");' : '') !!}
        function showToast(message, duration, bgColor, textColor) {
            var toastContainer = document.createElement("div");
            toastContainer.textContent = message;
            toastContainer.style.position = "fixed";
            toastContainer.style.bottom = "90%";
            toastContainer.style.right = "2%";
            toastContainer.style.transform = "translateX(-50%)";
            toastContainer.style.backgroundColor = bgColor;
            toastContainer.style.color = textColor;
            toastContainer.style.padding = "10px 20px";
            toastContainer.style.fontSize = "16px";
            toastContainer.style.borderRadius = "5px";
            toastContainer.style.zIndex = 9999;
            toastContainer.style.textShadow = "2px 2px 4px rgba(0, 0, 0, 0.5)";
            toastContainer.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.3)";
            document.body.appendChild(toastContainer);
            setTimeout(function () {
                document.body.removeChild(toastContainer);
            }, duration);
        }
    </script>
@endsection
