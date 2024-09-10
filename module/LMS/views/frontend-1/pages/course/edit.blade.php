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
            background-color: #00d7f3;
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
            background-color: #21a5ff;
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
        .icon-container-paste {
            height: 100px;
            width: 100px;
            background-color: #21d4aa;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        .icon-container-light-purple {
            height: 100px;
            width: 100px;
            background-color: #ff47e0;
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
                    <div class="col-xl-12">
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
                                                            <div
                                                                class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                                                <h5 class="mb-2 mb-sm-0">Add Topic</h5>
                                                                <a href="#" class="btn btn-sm btn-primary-soft mb-0"
                                                                   data-bs-toggle="modal" data-bs-target="#addLessons">
                                                                    <i class="bi bi-plus-circle me-2"></i>New Topic
                                                                </a>
                                                            </div>

                                                            <hr>

                                                            <!-- Edit lecture START -->
                                                            <div class="accordion accordion-icon accordion-bg-light"
                                                                 id="accordionExample2">
                                                                @foreach($course->courseCurriculum as $index => $curriculum)
                                                                    <input type="hidden" name="curriculum_ids[]"
                                                                           value="{{ $curriculum->id }}">
                                                                    <div class="accordion-item mb-3"
                                                                         id="accordion-{{ $index + 1 }}">
                                                                        <h6 class="accordion-header font-base">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-7">
                                                                                    <input type="text"
                                                                                           class="form-control fs-2"
                                                                                           style="border: none"
                                                                                           name="curriculum_names[]"
                                                                                           id="curriculum-{{ $curriculum->id }}"
                                                                                           value="{{ $curriculum->name }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <button
                                                                                        class="btn btn-sm btn-dark mb-0"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#addTopic"
                                                                                        data-curriculum-id="{{ $curriculum->id }}"
                                                                                        onclick="setModalTarget({{ $index + 1 }})">
                                                                                        <i class="bi bi-plus-circle me-2"></i>Add
                                                                                        an activity or resource
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    <button
                                                                                        class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic"
                                                                                        onclick="deleteCurriculum({{ $curriculum->id }})">
                                                                                        <i class="fas fa-fw fa-times"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            @if(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\ScormPackageModel::where('curriculum_id', $curriculum->id)->count() > 0 || \Module\LMS\Models\CourseCurriculumTopicFolderModel::where('course_curriculum_id', $curriculum->id)->count() > 0)
                                                                                <div class="row align-items-center">
                                                                                    <div align="center"
                                                                                         class="col-md-12">
                                                                                        <button class="bg-transparent"
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
                                                                        </h6>

                                                                        <div id="collapse-{{ $index + 1 }}"
                                                                             class="accordion-collapse"
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
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <div class="p-2">
                                                                                                        @include('frontend-1.pages.course.scorm-package.scorm-package-list-layout')
                                                                                                        @include('frontend-1.pages.course.topic.topic-list-layout')
                                                                                                        @include('frontend-1.pages.course.image.image-list-layout')
                                                                                                        @include('frontend-1.pages.course.video.video-list-layout')
                                                                                                        @include('frontend-1.pages.course.pdf.pdf-list-layout')
                                                                                                        @include('frontend-1.pages.course.excel.excel-list-layout')
                                                                                                        @include('frontend-1.pages.course.exam.exam-list-layout')
                                                                                                        @include('frontend-1.pages.course.quiz.quiz-list-layout')
                                                                                                        @include('frontend-1.pages.course.assessment.assessment-list-layout')

                                                                                                        @if($folder->innerFolderRecursive->count() > 0)
                                                                                                            <div class="p-2">
                                                                                                                @include('frontend-1.pages.course.folder.folder_recursive_edit', ['folders' => $folder->innerFolderRecursive, 'index' => $index])
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
                                                                                @include('frontend-1.pages.course.exam.exam-list-layout-no-folder')
                                                                                @include('frontend-1.pages.course.quiz.quiz-list-layout-no-folder')
                                                                                @include('frontend-1.pages.course.assessment.assessment-list-layout-no-folder')

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            </div>

                                                            <div class="d-flex justify-content-end mt-3">
                                                                <div class="text-md-end">
                                                                    <button type="submit"
                                                                            class="btn btn-success mb-sm-0"
                                                                            onclick="submitForm()">Update Course
                                                                    </button>
                                                                </div>
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
                                                                    <div>
                                                                        <h6 class="my-2">Upload course image here, or<a
                                                                                href="#!"
                                                                                class="text-primary">
                                                                                Browse</a></h6>
                                                                        <label style="cursor:pointer;">
													<span>
														<input class="form-control stretched-link" type="file"
                                                               name="image" id="image"
                                                               accept="image/gif, image/jpeg, image/png"/>
													</span>
                                                                        </label>
                                                                        <p class="small mb-0 mt-2"><b>Note:</b> 472*354
                                                                            image dimension & Only JPG, JPEG and PNG
                                                                            format support.</p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            {{--                                                            <div class="col-12">--}}
                                                            {{--                                                                <!-- Input -->--}}
                                                            {{--                                                                <div class="col-12 mt-4 mb-5">--}}
                                                            {{--                                                                    <label class="form-label">Video URL</label>--}}
                                                            {{--                                                                    <input class="form-control" type="text" name="video_url" value="{{ $course->video_url }}"--}}
                                                            {{--                                                                           placeholder="Enter video url">--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                                <div class="position-relative my-4">--}}
                                                            {{--                                                                    <hr>--}}
                                                            {{--                                                                    <p class="small position-absolute top-50 start-50 translate-middle bg-body px-3 mb-0">--}}
                                                            {{--                                                                        Or</p>--}}
                                                            {{--                                                                </div>--}}

                                                            {{--                                                                <div class="col-12">--}}
                                                            {{--                                                                    <label class="form-label">Upload video</label>--}}
                                                            {{--                                                                    <div class="input-group mb-3">--}}
                                                            {{--                                                                        <input type="file" class="form-control" name="video"--}}
                                                            {{--                                                                               id="inputGroupFile01">--}}
                                                            {{--                                                                        <label class="input-group-text">.mp4</label>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </div>--}}

                                                            {{--                                                            </div>--}}

                                                            <div class="col-12">
                                                                <label class="form-label">Course title</label>
                                                                <input class="form-control" type="text" name="title"
                                                                       placeholder="Enter course title"
                                                                       value="{{ $course->title }}">
                                                            </div>

                                                            <!-- Short description -->
                                                            <div class="col-12">
                                                                <label class="form-label">Short description</label>
                                                                <textarea class="form-control" name="short_description"
                                                                          rows="2"
                                                                          placeholder="Enter keywords">{{ $course->short_description }}</textarea>
                                                            </div>

                                                            <!-- Course category -->
                                                            <div class="col-md-6">
                                                                <label class="form-label">Course category</label>
                                                                <select
                                                                    class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                    name="course_category" aria-label=".form-select-sm"
                                                                    data-search-enabled="true">
                                                                    @foreach($courseCategories as $courseCategory)
                                                                        @if($course->course_category_id == $courseCategory->id)
                                                                            <option
                                                                                value="{{ $courseCategory->id }}"
                                                                                selected>{{ $courseCategory->name }}</option>
                                                                        @else
                                                                            <option
                                                                                value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Course level -->
                                                            <div class="col-md-6">
                                                                <label class="form-label">Course level</label>
                                                                <select
                                                                    class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                    name="course_level" aria-label=".form-select-sm"
                                                                    data-search-enabled="false"
                                                                    data-remove-item-button="true">
                                                                    @foreach($courseLevels as $courseLevel)
                                                                        @if($course->course_level_id == $courseLevel->id)
                                                                            <option
                                                                                value="{{ $courseLevel->id }}">{{ $courseLevel->name }}</option>
                                                                        @else
                                                                            <option
                                                                                value="{{ $courseLevel->id }}">{{ $courseLevel->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Course Start Date -->
                                                            <div class="col-md-3">
                                                                <label class="form-label">Course Start Date</label>
                                                                <input class="form-control" type="date"
                                                                       name="start_date"
                                                                       placeholder="Enter start date"
                                                                       value="{{ $course->start_date }}">
                                                            </div>

                                                            <!-- Course End Date -->
                                                            <div class="col-md-3">
                                                                <label class="form-label">Course End Date</label>
                                                                <input class="form-control" type="date" name="end_date"
                                                                       placeholder="Enter end date"
                                                                       value="{{ $course->end_date }}">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label class="form-label">Language</label>
                                                                <select
                                                                    class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                    name="language">
                                                                    <option value="">{{ $course->language }}</option>
                                                                    <option>English</option>
                                                                    <option>German</option>
                                                                    <option>French</option>
                                                                    <option>Hindi</option>
                                                                </select>
                                                            </div>

                                                            <div
                                                                class="col-md-3 d-flex align-items-center justify-content-start mt-5">
                                                                <div class="form-check form-switch form-check-md">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           name="is_featured"
                                                                           value="{{ $course->is_featured }}"
                                                                           id="checkPrivacy1" {{ $course->is_featured==1 ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="checkPrivacy1">Featured
                                                                        Course</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Course Duration(In
                                                                    Hour)</label>
                                                                <input class="form-control" type="number"
                                                                       name="duration"
                                                                       placeholder="Enter course time"
                                                                       value="{{ $course->duration }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Total lessons</label>
                                                                <input class="form-control" type="number"
                                                                       name="total_lessons"
                                                                       placeholder="Enter total lessons"
                                                                       value="{{ $course->total_lessons }}">
                                                            </div>

                                                            {{--                                                            <div class="col-md-6">--}}
                                                            {{--                                                                <label class="form-label">Course price</label>--}}
                                                            {{--                                                                <input type="number" class="form-control" name="price"--}}
                                                            {{--                                                                       placeholder="Enter course price" value="{{ $course->price }}">--}}
                                                            {{--                                                            </div>--}}

                                                            {{--                                                            <div class="col-md-6">--}}
                                                            {{--                                                                <label class="form-label">Discount(%)</label>--}}
                                                            {{--                                                                <input class="form-control" type="number" name="discount" value="{{ $course->discount }}"--}}
                                                            {{--                                                                       placeholder="Enter discount">--}}
                                                            {{--                                                                <div class="col-12 mt-1 mb-0">--}}
                                                            {{--                                                                    <div class="form-check small mb-0">--}}
                                                            {{--                                                                        <input class="form-check-input" type="checkbox" id="checkBox1">--}}
                                                            {{--                                                                        <label class="form-check-label" for="checkBox1">--}}
                                                            {{--                                                                            Enable this Discount--}}
                                                            {{--                                                                        </label>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            </div>--}}

                                                            <div class="col-12">
                                                                <label class="form-label">Add description</label>
                                                                <!-- Editor toolbar -->
                                                                <div
                                                                    class="bg-light border border-bottom-0 rounded-top py-3"
                                                                    id="quilltoolbar">
                                                    <span class="ql-formats">
                                                        <select class="ql-size"></select>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <button class="ql-bold"></button>
                                                        <button class="ql-italic"></button>
                                                        <button class="ql-underline"></button>
                                                        <button class="ql-strike"></button>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <select class="ql-color"></select>
                                                        <select class="ql-background"></select>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <button class="ql-code-block"></button>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <button class="ql-list" value="ordered"></button>
                                                        <button class="ql-list" value="bullet"></button>
                                                        <button class="ql-indent" value="-1"></button>
                                                        <button class="ql-indent" value="+1"></button>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <button class="ql-link"></button>
                                                        <button class="ql-image"></button>
                                                    </span>
                                                                    <span class="ql-formats">
                                                        <button class="ql-clean"></button>
                                                    </span>
                                                                </div>

                                                                <div
                                                                    class="bg-body border rounded-bottom h-400px overflow-hidden"
                                                                    id="quilleditor">

                                                                </div>
                                                                <input type="hidden" name="description"
                                                                       id="description">
                                                            </div>

                                                            <!-- Tags START -->
                                                            <div class="col-12">
                                                                <h4>Additional Info</h4>
                                                                <hr>
                                                                <div class="bg-light border rounded p-4">
                                                                    <h5 class="mb-0">Tags</h5>
                                                                    <!-- Comment -->
                                                                    <div class="mt-3">
                                                                        <input type="text" name="tags"
                                                                               class="form-control js-choice mb-0"
                                                                               data-placeholder="true"
                                                                               data-placeholder-Val="Enter tags"
                                                                               data-max-item-count="14"
                                                                               data-remove-item-button="true">
                                                                        <span class="small">Maximum of 5 keywords. Keywords should all be in lowercase. e.g. javascript, react, marketing</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Tags START -->

                                                            <!-- Reviewer START -->
                                                            <div class="col-12">
                                                                <div class="bg-light border rounded p-4">
                                                                    <h5 class="mb-0">Course Prerequisite</h5>

                                                                    <!-- Comment -->
                                                                    <div class="mt-3">
                                                        <textarea class="form-control" rows="4" name="prerequisites"
                                                                  placeholder="Write a course prerequisite"
                                                                  spellcheck="false"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Reviewer START -->
                                                            <!-- Edit lecture END -->

                                                            <!-- Step 3 button -->
                                                            <div class="d-flex justify-content-between">
                                                                <button class="btn btn-secondary prev-btn mb-0">
                                                                    Previous
                                                                </button>
                                                                <div class="text-md-end">
                                                                    <button type="submit"
                                                                            class="btn btn-success mb-2 mb-sm-0"
                                                                            onclick="submitForm()">Update Course
                                                                    </button>
                                                                </div>
                                                            </div>
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

    @include('frontend-1.pages.course.curriculum-modal')

    @include('frontend-1.pages.course.activity-resource-modal')

    <!-- Popup modal for add faq START -->
    <div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="addQuestionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addQuestionLabel">Add FAQ</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Question -->
                        <div class="col-12">
                            <label class="form-label">Question</label>
                            <input class="form-control" type="text" placeholder="Write a question">
                        </div>
                        <!-- Answer -->
                        <div class="col-12 mt-3">
                            <label class="form-label">Answer</label>
                            <textarea class="form-control" rows="4" placeholder="Write a answer"
                                      spellcheck="false"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success my-0">Add topic</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup modal for add faq END -->

    <div id="progress-modal" class="modal" style="display: none;">
        <div class="modal-content" style="background-color: rgba(12,12,12,0.7);">
            <div style="display: flex; align-items: center; justify-content: center; margin-top: 12%; ">
                <lottie-player id="progress-lottie"
                               src="https://lottie.host/0b9b8d29-d7e8-47da-90ac-212fbe218032/H9trT3bcdK.json" speed="1"
                               style="width: 100px; height: 100px;" loop autoplay></lottie-player>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <h4 style="color: rgb(0,255,144);">Uploading Course...</h4>
            </div>
            <div id="progress-wrapper" style="display: flex; align-items: center; justify-content: center;">
                <div id="progress-bar-container" style="background-color: #e0e0e0; width: 30%; height: 30px;">
                    <div id="progress-bar" style="width: 0; height: 100%; background: linear-gradient(to right, rgb(106,203,161), rgb(0,201,113));
); text-align: center; line-height: 30px;">
                        <span id="progress-text">0%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="display: none;">
            <button onclick="closeModal()" class="modal-close-button">Close</button>
        </div>
    </div>

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        // function submitForm() {
        //     let form = document.getElementById('course_form');
        //     quillEditorDataTaken();
        //     form.submit();
        // }
        function submitCurriculumForm() {
            var form = document.getElementById('course_curriculum_form');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);

            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    var progressBar = document.getElementById('progress-bar');
                    var progressText = document.getElementById('progress-text');

                    progressBar.style.width = percentComplete + '%';
                    progressText.style.color = 'white';
                    progressText.innerHTML = Math.round(percentComplete) + '%';
                }
            }, false);

            xhr.addEventListener('load', function () {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    alert('An error occurred while submitting the form. Please try again.');
                    location.reload();
                    closeModal();
                }
            });

            xhr.addEventListener('error', function () {
                alert('An error occurred while submitting the form. Please try again.');
                closeModal();
            });

            xhr.addEventListener('abort', function () {
                alert('Form submission was aborted.');
                closeModal();
            });

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    closeModal();
                }
            };

            openModal();
            xhr.send(formData);
        }

        function openModal() {
            document.getElementById('progress-modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('progress-modal').style.display = 'none';
        }

        function submitForm() {
            var form = document.getElementById('course_form');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);

            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    var progressBar = document.getElementById('progress-bar');
                    var progressText = document.getElementById('progress-text');

                    progressBar.style.width = percentComplete + '%';
                    progressText.style.color = 'white';
                    progressText.innerHTML = Math.round(percentComplete) + '%';
                }
            }, false);

            xhr.addEventListener('load', function () {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    alert('An error occurred while submitting the form. Please try again.');
                    location.reload();
                    closeModal();
                }
            });

            xhr.addEventListener('error', function () {
                alert('An error occurred while submitting the form. Please try again.');
                closeModal();
            });

            xhr.addEventListener('abort', function () {
                alert('Form submission was aborted.');
                closeModal();
            });

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    closeModal();
                }
            };

            openModal();
            xhr.send(formData);
        }


    </script>

    <script>
        let quill = new Quill('#quilleditor', {
            theme: 'snow'
        });

        function quillEditorDataTaken() {
            let quillEditorContent = document.querySelector('#quilleditor .ql-editor').innerHTML;
            document.getElementById('description').value = quillEditorContent;
        }
    </script>
    <script>
        let loadedLessonCount = {{ \Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->count() }};
        let lessonCounter = loadedLessonCount ?? 0;
        let currentLessonCounter = 0;

        function setModalTarget(counter, folderId) {
            currentLessonCounter = counter;
            const button = document.querySelector(`[data-bs-target="#addTopic"][onclick="setModalTarget(${currentLessonCounter})"]`);
            const scormPackageLink = document.getElementById('scormPackageLink');
            const scormPackagebaseUrl = "{{ route('scorm-package.create', ['id' => '']) }}";
            const newHref = `${scormPackagebaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            scormPackageLink.setAttribute('href', newHref);

            const topicLink = document.getElementById('topicLink');
            const topicBaseUrl = "{{ route('topic.create', ['id' => '']) }}";
            const topicNewHref = `${topicBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            topicLink.setAttribute('href', topicNewHref);

            const imageLink = document.getElementById('imageLink');
            const imageBaseUrl = "{{ route('image.create', ['id' => '']) }}";
            const imageNewHref = `${imageBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            imageLink.setAttribute('href', imageNewHref);

            const videoLink = document.getElementById('videoLink');
            const videoBaseUrl = "{{ route('video.create', ['id' => '']) }}";
            const videoNewHref = `${videoBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            videoLink.setAttribute('href', videoNewHref);

            const pdfLink = document.getElementById('pdfLink');
            const pdfBaseUrl = "{{ route('pdf.create', ['id' => '']) }}";
            const pdfNewHref = `${pdfBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            pdfLink.setAttribute('href', pdfNewHref);

            const excelLink = document.getElementById('excelLink');
            const excelBaseUrl = "{{ route('excel.create', ['id' => '']) }}";
            const excelNewHref = `${excelBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            excelLink.setAttribute('href', excelNewHref);

            const folderLink = document.getElementById('folderLink');
            const folderBaseUrl = "{{ route('folder.create', ['id' => '']) }}";
            const folderNewHref = `${folderBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            folderLink.setAttribute('href', folderNewHref);

            const examLink = document.getElementById('examLink');
            const examBaseUrl = "{{ route('exams.create', ['id' => '']) }}";
            const examNewHref = `${examBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            examLink.setAttribute('href', examNewHref);

            const assessmentLink = document.getElementById('assessmentLink');
            const assessmentBaseUrl = "{{ route('course-assessment.create', ['id' => '']) }}";
            const assessmentNewHref = `${assessmentBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            assessmentLink.setAttribute('href', assessmentNewHref);

            const quizLink = document.getElementById('quizLink');
            const quizBaseUrl = "{{ route('quiz.create', ['id' => '']) }}";
            const quizNewHref = `${quizBaseUrl}/${button.getAttribute('data-curriculum-id')}/${folderId}`;
            quizLink.setAttribute('href', quizNewHref);
        }

        function addLesson() {
            closeModal();
            submitCurriculumForm();
        }

        function removeCurriculum(accordionId) {
            const accordionItem = document.getElementById(accordionId);
            if (accordionItem) {
                accordionItem.remove();
            }
        }
    </script>
    <script>
        function closeModal() {
            const modal = document.querySelector('.modal');
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            if (bootstrapModal && bootstrapModal._isShown) {
                bootstrapModal.hide();
            }
        }
    </script>
    <script>
        function addTopic() {
            const targetDiv = document.getElementById(`appendTopic${currentLessonCounter}`);
            const topicName = document.getElementById('topicName');
            const lessonName = document.getElementById(`accordion-${currentLessonCounter}`).querySelector('input[name="curriculum_names[]"]').value;

            const topicHtml = `
        <div class="border p-4">
        <div class="topic-item d-flex justify-content-between align-items-center">
            <div class="position-relative">
                <span style="font-size: 18px; font-weight: bold; font-family: Montserrat, sans-serif; color: #00a5bb;">Unsaved Topic</span>
            </div>
            <div>
                <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic">
                    <i class="fas fa-fw fa-times"></i>
                </button>
            </div>
        </div>
        <br>
        <div>
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row text-start g-3">
                <div class="col-md-8">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="topic_names[${lessonName}][]" value="${topicName.value}" placeholder="Enter Topic name" required>
                </div>
                <div class="col-md-4">
                <label class="form-label">Video link</label>
                <input class="form-control" type="text" id="topicVideoLink" name="topic_video_links[${lessonName}][]" placeholder="Enter Video link">
                </div>
                <div class="col-md-4">
                <label class="form-label">Upload Image <i class="fa fa-image"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(JPG format only)</span></label>
                <input class="form-control" type="file" name="topic_images[${lessonName}][]" id="topicImage" placeholder="Enter Video link">
                </div>
                <div class="col-md-4">
                <label class="form-label">Upload Video <i class="fa fa-video"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(MP4 format only)</span></label>
                <input class="form-control" type="file" name="topic_videos[${lessonName}][]" id="topicVideo" placeholder="Enter Video link">
                </div>
                <div class="col-md-4">
                <label class="form-label">Upload Document <i class="fa fa-file-pdf"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(PDF format only)</span></label>
                <input class="form-control" type="file" id="topicDocument" name="topic_documents[${lessonName}][]" placeholder="Enter Video link">
                </div>
                <div class="col-12 mt-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="topicDescription" name="topic_descriptions[${lessonName}][]" rows="4" placeholder="" spellcheck="false"></textarea>
                </div>
                </div>
                </div>

                </div>
                </div>
                </div>
                </div>
                <br>
    `;
            targetDiv.innerHTML += topicHtml;

            // Add event listener to the delete button
            const deleteButtons = document.querySelectorAll('.delete-topic');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    this.parentElement.parentElement.parentElement.remove(); // Remove the topic div
                });
            });

            var modal = document.getElementById('addTopic');
            var bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide();
        }


    </script>

    <script>
        function addMoreScormInput() {
            let scormInputDiv = `<div class="input-group mb-3">
                                                                    <input type="file" class="form-control" name="scorm_package[]">
                                                                    <label class="input-group-text text-success">SCORM File</label>
                                                                    <button class="btn minus-btn" onclick="removeScormInput(this)"><i class="fas fa-fw fa-minus-circle"></i></button>
                                                                </div>`;
            let existingDiv = document.getElementById('scormAddedDiv').innerHTML;
            document.getElementById('scormAddedDiv').innerHTML = existingDiv + scormInputDiv;
        }

        function removeScormInput(button) {
            let inputGroup = button.parentNode;
            inputGroup.parentNode.removeChild(inputGroup);
        }
    </script>

    <script>
        document.querySelectorAll('input[type="date"]').forEach(function (input) {
            input.addEventListener('click', function () {
                this.showPicker();
            });
        });
    </script>

    <script>
        function scromPackageDelete(scormPackageId) {
            if (confirm('Delete this SCORM Package?')) {
                let url = '/delete-scorm-package';
                let data = {
                    ScormPackageId: scormPackageId,
                }
                axios.post(url, data).then(
                    function (response) {
                        if (response.data === 1) {
                            location.reload();
                        }
                    }
                ).catch(
                    function (error) {
                        alert(error);
                    }
                )
            }
        }

        function folderDelete(folderId) {
            let url = '/delete-folder';
            let data = {
                FolderId: folderId,
            }
            axios.post(url, data).then(
                function (response) {
                    if (response.data === 1) {
                        location.reload();
                    }
                }
            ).catch(
                function (error) {
                    alert(error);
                }
            )
        }

        function deleteTopic(topicId) {
            let url = '/delete-topic';
            let data = {
                TopicId: topicId,
            }
            axios.post(url, data).then(
                function (response) {
                    location.reload();
                }
            ).catch(
                function (error) {
                    alert(error);
                }
            )
        }

        function deleteCurriculum(curriculumId) {
            let url = '/delete-curriculum';
            let data = {
                CurriculumId: curriculumId,
            }
            axios.post(url, data).then(
                function (response) {
                    location.reload();
                }
            ).catch(
                function (error) {
                    alert(error);
                }
            )
        }

    </script>
@endsection
