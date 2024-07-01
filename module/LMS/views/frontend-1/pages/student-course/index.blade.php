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
        <div class="page-content" style="margin-left: 0 !important;">
            <div class="page-content-wrapper border">
                <div class="row mb-3">
                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-2 mb-sm-0">Courses</h1>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-lg-4">
                        <div class="text-center p-4 bg-primary bg-opacity-10 border border-primary rounded-3">
                            <h6>Total Courses</h6>
                            <h2 class="mb-0 fs-1 text-primary">{{ sizeof($courses) }}</h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="text-center p-4 bg-success bg-opacity-10 border border-success rounded-3">
                            <h6>Activated Courses</h6>
                            <h2 class="mb-0 fs-1 text-success">{{ sizeof($courses) }}</h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="text-center p-4  bg-warning bg-opacity-15 border border-warning rounded-3">
                            <h6>Pending Courses</h6>
                            <h2 class="mb-0 fs-1 text-warning">00</h2>
                        </div>
                    </div>
                </div>
                <div class="card bg-transparent border">
                    <div class="card-header bg-light border-bottom">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-md-8">
                                <form class="rounded position-relative">
                                    <input class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
                                    <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                        <i class="fas fa-search fs-6 "></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form>
                                    <select class="form-select js-choice border-0 z-index-9" aria-label=".form-select-sm">
                                        <option value="">Sort by</option>
                                        <option>Newest</option>
                                        <option>Oldest</option>
                                        <option>Accepted</option>
                                        <option>Rejected</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-0 rounded-3">
                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Course Name</th>
                                    <th scope="col" class="border-0">Added Date</th>
                                    <th scope="col" class="border-0">Level</th>
{{--                                    <th scope="col" class="border-0">Price</th>--}}
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($courses as $course)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="w-60px">
                                                    <img src="{{ asset($course->image) }}" class="rounded" alt="">
                                                </div>
                                                <h6 class="table-responsive-title mb-0 ms-2">
                                                    {{ $course->title }}
                                                </h6>
                                            </div>
                                        </td>
                                        <td>{{ $course->created_at->toDateString() }}</td>
                                        <td> <span class="badge text-bg-primary">{{ $course->courseLevel->name }}</span> </td>
{{--                                        <td>${{ $course->price ?? 0 }}</td>--}}
                                        <td> <span class="badge bg-warning bg-opacity-15 text-success">{{ $course->status==1 ? 'Active' : 'Inactive' }}</span> </td>
                                        <td>
                                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">Open</a>
                                            @php
                                                $totalCurriculum = sizeOf(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get());
                                                $totalCompleteCurriculum = sizeOf(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->where('is_completion', '1')->get());
                                            @endphp
                                            <a href="{{ route('student-course-study.show', $course->id) }}" class="btn btn-sm btn-info-soft me-1 mb-1 mb-md-0">@if($totalCompleteCurriculum > 0 && $totalCompleteCurriculum < $totalCurriculum) <span class="text-danger">Continue ({{ intval(($totalCompleteCurriculum / $totalCurriculum) * 100) }}%) </span> @elseif($totalCompleteCurriculum == $totalCurriculum) <span class="text-success">Complete</span> @else Start Course @endif  </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No courses available.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent pt-0">
                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                            <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                    <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
@endsection
