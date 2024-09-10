@extends('frontend-1.layout.app')

@section('script')
    <style>
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: rgba(9, 9, 9, 0.74);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .modal-footer {
            text-align: right;
            margin-top: 10px;
        }

        .modal-close-button {
            background: #ff5e5e;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-close-button:hover {
            background: #ff4040;
        }

        #progress-wrapper {
            display: none;
        }

        #progress-bar {
            width: 0;
            height: 20px;
            background-color: #4caf50;
            text-align: center;
            color: white;
        }
    </style>
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
            if (el != 'undefined' && el != null) {
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
@endsection

@section('content')
    <style>
        .custom-card {
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .custom-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .icon-container-blue {
            height: 100px;
            width: 100px;
            background-color: #00a5bb;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-red {
            height: 100px;
            width: 100px;
            background-color: #dc3d3d;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-purple {
            height: 100px;
            width: 100px;
            background-color: #5d33c1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-oceanblue {
            height: 100px;
            width: 100px;
            background-color: #30a6b1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-yellow {
            height: 100px;
            width: 100px;
            background-color: #eed711;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-green {
            height: 100px;
            width: 100px;
            background-color: #32bb00;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .icon-container-pink {
            height: 100px;
            width: 100px;
            background-color: #ba1d8c;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
    </style>
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-129">
                        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded"
                                 style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h1 class="text-white">{{ $course->title }}</h1>
                                        <p class="text-light">Dashboard/Courses/{{ $course->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="container">
                                <div class="card bg-transparent border rounded-3 mb-5">
                                    <div id="stepper" class="bs-stepper stepper-outline">
                                        <div class="card-header bg-light border-bottom px-lg-5">
                                            <div class="bs-stepper-header" role="tablist">
                                                <div class="step" data-target="#step-1">
                                                    <div class="d-grid text-center align-items-center">
                                                        <button type="button" class="btn btn-link step-trigger mb-0"
                                                                role="tab"
                                                                id="steppertrigger1" aria-controls="step-1">
                                                            <span class="bs-stepper-circle">1</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Topic</h6>
                                                    </div>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step-2">
                                                    <div class="d-grid text-center align-items-center">
                                                        <button type="button" class="btn btn-link step-trigger mb-0"
                                                                role="tab"
                                                                id="steppertrigger2" aria-controls="step-2">
                                                            <span class="bs-stepper-circle">2</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Course
                                                            details</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-body">
                                            <div class="bs-stepper-content">
                                                <form action="{{ route('course.update', $course->id) }}" method="post"
                                                      enctype="multipart/form-data"
                                                      onsubmit="return false" id="course_form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div id="step-1" role="tabpanel" class="content fade"
                                                         aria-labelledby="steppertrigger1">

                                                        <div class="row g-4">
                                                            <!-- Add Lessons Modal button -->
{{--                                                            <div--}}
{{--                                                                class="d-sm-flex justify-content-sm-between align-items-center mb-3">--}}
{{--                                                                <h5 class="mb-2 mb-sm-0">Add Topic</h5>--}}
{{--                                                                <a href="#" class="btn btn-sm btn-primary-soft mb-0"--}}
{{--                                                                   data-bs-toggle="modal" data-bs-target="#addLessons">--}}
{{--                                                                    <i class="bi bi-plus-circle me-2"></i>New Topic--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}

{{--                                                            <hr>--}}

                                                            <!-- Edit lecture START -->
                                                            <div class="accordion accordion-icon accordion-bg-light"
                                                                 id="accordionExample2">
                                                                @foreach(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get() as $index => $curriculum)
                                                                    <input type="hidden" name="curriculum_ids[]"
                                                                           value="{{ $curriculum->id }}">
                                                                    <div class="accordion-item mb-3"
                                                                         id="accordion-{{ $index + 1 }}">
                                                                        <h6 class="accordion-header font-base">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-11">
                                                                                    <input type="text"
                                                                                           class="form-control fs-2"
                                                                                           style="border: none"
                                                                                           name="curriculum_names[]"
                                                                                           id="curriculum-{{ $curriculum->id }}"
                                                                                           value="{{ $curriculum->name }}">
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    @if(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\ScormPackageModel::where('curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\CourseCurriculumTopicFolderModel::where('course_curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\CourseAssessmentModel::where('curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\ExamModel::where('type', 'exam')->where('course_curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\ExamModel::where('type', 'quiz')->where('course_curriculum_id', $curriculum->id)->count() > 0)
                                                                                        <div class="row align-items-center">
                                                                                            <div align="center"
                                                                                                 class="col-md-12">
                                                                                                <button class="course-show-collapse-expand-button-style-1"
                                                                                                        style="border: none;"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#collapse-{{ $index + 1 }}"
                                                                                                        aria-expanded="false"
                                                                                                        aria-controls="collapse-{{ $index + 1 }}">
                                                                                                    &#11206;
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </h6>

                                                                        <div id="collapse-{{ $index + 1 }}"
                                                                             class="accordion-collapse collapse show"
                                                                             data-bs-parent="#accordion-{{ $index + 1 }}">
                                                                            <div class="accordion-body mt-3">
                                                                                <div id="appendTopic{{ $index + 1 }}">
                                                                                    @if($curriculum->curriculumFolder->count() > 0)
                                                                                        <div class="col-12 mb-1">
                                                                                            <div>
                                                                                                <!-- Comment -->
                                                                                                <div class="p-2">
                                                                                                    @foreach(\Module\LMS\Models\CourseCurriculumTopicFolderModel::where('course_curriculum_id', $curriculum->id)->where('folder_id', null)->get() as $folder)
                                                                                                        <div class="row mb-1">
                                                                                                            <div class="col-md-6">
                                                                                                                <i class="fa fa-folder text-info"></i> <span>{{ $folder->name }}</span> &nbsp;&nbsp;&nbsp;
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                @if(Route::currentRouteName() == 'course.edit')
                                                                                                                    <button
                                                                                                                        class="btn btn-sm btn-dark mb-0"
                                                                                                                        data-bs-toggle="modal"
                                                                                                                        data-bs-target="#addTopic"
                                                                                                                        data-curriculum-id="{{ $curriculum->id }}"
                                                                                                                        onclick="setModalTarget({{ $index + 1 }}, {{ $folder->id }})">
                                                                                                                        <i class="bi bi-plus-circle me-2"></i>Add
                                                                                                                        an activity or resource
                                                                                                                    </button>
                                                                                                                    <button
                                                                                                                        class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic"
                                                                                                                        onclick="folderDelete({{ $folder->id }})">
                                                                                                                        <i class="fas fa-fw fa-times"></i>
                                                                                                                    </button>
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="p-2">
                                                                                                            @include('frontend-1.pages.course.scorm-package.scorm-package-list-layout')
                                                                                                            @include('frontend-1.pages.course.topic.topic-list-layout')
                                                                                                            @include('frontend-1.pages.course.image.image-list-layout')
                                                                                                            @include('frontend-1.pages.course.video.video-list-layout')
                                                                                                            @include('frontend-1.pages.course.pdf.pdf-list-layout')
                                                                                                            @include('frontend-1.pages.course.excel.excel-list-layout')
                                                                                                                @if(in_array(auth()->user()->role_id, [1, 2, 3, 6]))
                                                                                                                    @include('frontend-1.pages.course.exam.exam-list-layout')
                                                                                                                    @include('frontend-1.pages.course.quiz.quiz-list-layout')
                                                                                                                @endif
                                                                                                            @include('frontend-1.pages.course.assessment.assessment-list-layout')

                                                                                                            @if($folder->innerFolderRecursive->count() > 0)
                                                                                                                <div class="p-2">
                                                                                                                    @include('frontend-1.pages.course.folder.folder_recursive_show', ['folders' => $folder->innerFolderRecursive, 'index' => $index])
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                    @include('frontend-1.pages.course.topic.topic-list-layout-no-folder')
                                                                                    @include('frontend-1.pages.course.image.image-list-layout-no-folder')
                                                                                    @include('frontend-1.pages.course.video.video-list-layout-no-folder')
                                                                                    @include('frontend-1.pages.course.pdf.pdf-list-layout-no-folder')
                                                                                    @include('frontend-1.pages.course.excel.excel-list-layout-no-folder')
                                                                                    @include('frontend-1.pages.course.scorm-package.scorm-package-list-layout-no-folder')
                                                                                        @if(in_array(auth()->user()->role_id, [1, 2, 3, 6]))
                                                                                            @include('frontend-1.pages.course.exam.exam-list-layout-no-folder')
                                                                                            @include('frontend-1.pages.course.quiz.quiz-list-layout-no-folder')
                                                                                        @endif
                                                                                    @include('frontend-1.pages.course.assessment.assessment-list-layout-no-folder')
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div id="step-2" role="tabpanel" class="content fade"
                                                         aria-labelledby="steppertrigger2">
                                                        <!-- Title -->
                                                        <h4>Course details</h4>

                                                        <hr> <!-- Divider -->

                                                        <div class="row g-4">
                                                            <div class="col-12">
                                                                <div
                                                                    class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                                                    <!-- Image -->
                                                                    <img
                                                                        src="{{ asset($course->image) }}"
                                                                        class="h-50px" alt="">
                                                                </div>

                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Course title</label>
                                                                <h6>
                                                                    {{ $course->title }}
                                                                    @if($course->is_featured == 1)
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <span style="font-size: 10px;">
                                                                            <i class="fa fa-check-circle text-success"></i>Featured Course
                                                                        </span>
                                                                    @endif
                                                                </h6>
                                                            </div>

                                                            <!-- Short description -->
                                                            <div class="col-12">
                                                                <label class="form-label">Short description</label>
                                                                <h6>{{ $course->short_description }}</h6>
                                                            </div>

                                                            <!-- Course category -->
                                                            <div class="col-md-6">
                                                                <label class="form-label">Course category</label>
                                                                <h6>{{ $course->courseCategory->name }}</h6>
                                                            </div>

                                                            <!-- Course level -->
                                                            <div class="col-md-6">
                                                                <label class="form-label">Course level</label>
                                                                <h6>{{ $course->courseLevel->name }}</h6>
                                                            </div>

                                                            <!-- Course Start Date -->
                                                            <div class="col-md-3">
                                                                <label class="form-label">Course Start Date</label>
                                                                <h6>{{ $course->start_date }}</h6>
                                                            </div>

                                                            <!-- Course End Date -->
                                                            <div class="col-md-3">
                                                                <label class="form-label">Course End Date</label>
                                                                <h6>{{ $course->end_date }}</h6>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label class="form-label">Language</label>
                                                                <h6>{{ $course->language }}</h6>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label class="form-label">Course Duration(In
                                                                    Hour)</label>
                                                                <h6>{{ $course->duration }}</h6>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Total lessons</label>
                                                                <h6>{{ $course->total_lessons }}</h6>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Add description</label>
                                                                <h6>{{ $course->description }}</h6>
                                                            </div>

                                                            <!-- Tags START -->
                                                            <div class="col-12">
                                                                <h4>Additional Info</h4>
                                                                <hr>
                                                                <div class="bg-light border rounded p-4">
                                                                    <h5 class="mb-0">Tags</h5>
                                                                    <!-- Comment -->
                                                                    <div class="mt-1 p-2">
                                                                        @foreach(json_decode($course->tags) as $tag)
                                                                            <h6>{{ $tag }}</h6>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Tags START -->

                                                            <!-- Reviewer START -->
                                                            <div class="col-12">
                                                                <div class="bg-light border rounded p-4">
                                                                    <h5 class="mb-0">Course Prerequisite</h5>

                                                                    <!-- Comment -->
                                                                    <div class="mt-1 p-2">
                                                                        <span>{{ $course->prerequisites }}</span>
                                                                </div>
                                                            </div>
                                                            <!-- Reviewer START -->
                                                        </div>

                                                    </div>
                                                    <!-- Step 3 content END -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        function closeModal() {
            const modal = document.querySelector('.modal');
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            if (bootstrapModal && bootstrapModal._isShown) {
                bootstrapModal.hide();
            }
        }
    </script>

@endsection
