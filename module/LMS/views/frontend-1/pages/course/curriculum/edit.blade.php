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
        @include('frontend-1.partials.dashboard-header')
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    @include('frontend-1.partials.dashboard-sidebar')
                    <div class="col-xl-9">
                        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0"
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
                                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                                id="steppertrigger1" aria-controls="step-1">
                                                            <span class="bs-stepper-circle">1</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
                                                    </div>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step-2">
                                                    <div class="d-grid text-center align-items-center">
                                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                                id="steppertrigger2" aria-controls="step-2">
                                                            <span class="bs-stepper-circle">2</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-body">
                                            <div class="bs-stepper-content">
                                                <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data"
                                                      onsubmit="return false" id="course_form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div id="step-1" role="tabpanel" class="content fade"
                                                         aria-labelledby="steppertrigger1">
                                                        <h4>Curriculum</h4>

                                                        <hr>

                                                        <div class="row g-4">
                                                            <!-- Add Lessons Modal button -->
                                                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                                                <h5 class="mb-2 mb-sm-0">Upload Lessons</h5>
                                                                <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addLessons">
                                                                    <i class="bi bi-plus-circle me-2"></i>Add Lessons
                                                                </a>
                                                            </div>

                                                            <!-- Edit lecture START -->
                                                            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                                                @foreach(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get() as $index => $curriculum)
                                                                    <input type="hidden" name="curriculum_ids[]" value="{{ $curriculum->id }}">
                                                                    <div class="accordion-item mb-3" id="accordion-{{ $index + 1 }}">
                                                                        <h6 class="accordion-header font-base">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-10">
                                                                                    <input type="text" class="form-control" name="curriculum_names[]" value="{{ $curriculum->name }}" placeholder="Name of the lessons">
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    <button class="accordion-button fw-bold rounded collapsed" style="width: 52px; margin-top: 5px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index + 1 }}" aria-expanded="false" aria-controls="collapse-{{ $index + 1 }}">
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic" onclick="deleteCurriculum({{ $curriculum->id }})">
                                                                                        <i class="fas fa-fw fa-times"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </h6>

                                                                        <div id="collapse-{{ $index + 1 }}" class="accordion-collapse collapse" data-bs-parent="#accordion-{{ $index + 1 }}">
                                                                            <div class="accordion-body mt-3">
                                                                                <div id="appendTopic{{ $index + 1 }}">
                                                                                    @foreach(\Module\LMS\Models\CourseCurriculumTopicModel::with('learningResource')->where('curriculum_id', $curriculum->id)->get() as $topic)
                                                                                        @php
                                                                                            $resources = $topic->learningResource;
                                                                                            $image = $resources->firstWhere('type', 'image');
                                                                                            $video = $resources->firstWhere('type', 'video');
                                                                                            $document = $resources->firstWhere('type', 'document');
                                                                                            $url = $resources->firstWhere('type', 'url');
                                                                                        @endphp
                                                                                        <input type="hidden" name="topic_id[{{ $curriculum->name }}][]" value="{{ $topic->id }}">
                                                                                        <div class="border p-4">
                                                                                            <div class="topic-item d-flex justify-content-between align-items-center">
                                                                                                <div class="position-relative">
                                                                                                    <span style="font-size: 18px; font-weight: bold; font-family: Montserrat, sans-serif; color: #00a5bb;">Topic {{ $loop->iteration }}</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic" onclick="deleteTopic({{ $topic->id }})">
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
                                                                                                                    <input class="form-control" type="text" name="topic_names[{{ $curriculum->name }}][]" value="{{ $topic->name }}" placeholder="Enter Topic name">
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                    <label class="form-label">Video link</label>
                                                                                                                    <input class="form-control" type="text" id="topicVideoLink" name="topic_video_links[{{ $curriculum->name }}][]" value="{{ $url ? $url->link : '' }}" placeholder="Enter Video link">
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                    <label class="form-label">Upload Image <i class="fa fa-image"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(JPG format only)</span></label>
                                                                                                                    <br>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-3">
                                                                                                                            <img src="{{ $image ? asset($image->link) : '' }}" style="width: 50px; height: 50px;">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-9">
                                                                                                                            <input class="form-control" type="file" name="topic_images[{{ $curriculum->name }}][]" id="topicImage" placeholder="Enter Video link">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                    <label class="form-label">Upload Video <i class="fa fa-video"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(MP4 format only)</span></label>
                                                                                                                    <br>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-3">
                                                                                                                            <video style="width: 50px; height: 50px;" controls>
                                                                                                                                <source src="{{ $video ? asset($video->link) : '' }}" type="video/mp4">
                                                                                                                                Your browser does not support the video tag.
                                                                                                                            </video>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-9">
                                                                                                                            <input class="form-control" type="file" name="topic_videos[{{ $curriculum->name }}][]" id="topicVideo" placeholder="Enter Video link">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                    <label class="form-label">Upload Document <i class="fa fa-file-pdf"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(PDF format only)</span></label>
                                                                                                                    <br>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-3">
                                                                                                                            <iframe src="{{ $document ? asset($document->link) : '' }}" style="width: 50px; height: 50px;"></iframe>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-9">
                                                                                                                            <input class="form-control" type="file" id="topicDocument" name="topic_documents[{{ $curriculum->name }}][]" placeholder="Enter Video link">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-12 mt-3">
                                                                                                                    <label class="form-label">Description</label>
                                                                                                                    <textarea class="form-control" id="topicDescription" name="topic_descriptions[{{ $curriculum->name }}][]" rows="4" placeholder="" spellcheck="false">{{ $topic->description }}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br>
                                                                                        </div>
                                                                                        <br>
                                                                                    @endforeach
                                                                                </div>
                                                                                <br>
                                                                                <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic" onclick="setModalTarget({{ $index + 1 }})">
                                                                                    <i class="bi bi-plus-circle me-2"></i>Add topic
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <div class="d-flex justify-content-end mt-3">
                                                                <button class="btn btn-primary next-btn mb-0">Next</button>
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
                                                                        <h6 class="my-2">Upload course image here, or<a href="#!"
                                                                                                                        class="text-primary">
                                                                                Browse</a></h6>
                                                                        <label style="cursor:pointer;">
													<span>
														<input class="form-control stretched-link" type="file"
                                                               name="image" id="image"
                                                               accept="image/gif, image/jpeg, image/png"/>
													</span>
                                                                        </label>
                                                                        <p class="small mb-0 mt-2"><b>Note:</b> 472*354 image dimension & Only JPG, JPEG and PNG
                                                                            format support.</p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-12">
                                                                <!-- Input -->
                                                                <div class="col-12 mt-4 mb-5">
                                                                    <label class="form-label">Video URL</label>
                                                                    <input class="form-control" type="text" name="video_url" value="{{ $course->video_url }}"
                                                                           placeholder="Enter video url">
                                                                </div>
                                                                <div class="position-relative my-4">
                                                                    <hr>
                                                                    <p class="small position-absolute top-50 start-50 translate-middle bg-body px-3 mb-0">
                                                                        Or</p>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label class="form-label">Upload video</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" class="form-control" name="video"
                                                                               id="inputGroupFile01">
                                                                        <label class="input-group-text">.mp4</label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Course title</label>
                                                                <input class="form-control" type="text" name="title"
                                                                       placeholder="Enter course title" value="{{ $course->title }}">
                                                            </div>

                                                            <!-- Short description -->
                                                            <div class="col-12">
                                                                <label class="form-label">Short description</label>
                                                                <textarea class="form-control" name="short_description" rows="2"
                                                                          placeholder="Enter keywords">{{ $course->short_description }}</textarea>
                                                            </div>

                                                            <!-- Course category -->
                                                            <div class="col-md-6">
                                                                <label class="form-label">Course category</label>
                                                                <select class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                        name="course_category" aria-label=".form-select-sm"
                                                                        data-search-enabled="true">
                                                                    @foreach($courseCategories as $courseCategory)
                                                                        @if($course->course_category_id == $courseCategory->id)
                                                                            <option
                                                                                value="{{ $courseCategory->id }}" selected>{{ $courseCategory->name }}</option>
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
                                                                <select class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                        name="course_level" aria-label=".form-select-sm"
                                                                        data-search-enabled="false" data-remove-item-button="true">
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
                                                                <input class="form-control" type="date" name="start_date"
                                                                       placeholder="Enter start date" value="{{ $course->start_date }}">
                                                            </div>

                                                            <!-- Course End Date -->
                                                            <div class="col-md-3">
                                                                <label class="form-label">Course End Date</label>
                                                                <input class="form-control" type="date" name="end_date"
                                                                       placeholder="Enter end date" value="{{ $course->end_date }}">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label class="form-label">Language</label>
                                                                <select class="form-select js-choice border-0 z-index-9 bg-transparent"
                                                                        name="language">
                                                                    <option value="">{{ $course->language }}</option>
                                                                    <option>English</option>
                                                                    <option>German</option>
                                                                    <option>French</option>
                                                                    <option>Hindi</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-3 d-flex align-items-center justify-content-start mt-5">
                                                                <div class="form-check form-switch form-check-md">
                                                                    <input class="form-check-input" type="checkbox" name="is_featured"
                                                                           value="{{ $course->is_featured }}" id="checkPrivacy1" {{ $course->is_featured==1 ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="checkPrivacy1">Featured Course</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Course Duration(In Hour)</label>
                                                                <input class="form-control" type="number" name="duration"
                                                                       placeholder="Enter course time" value="{{ $course->duration }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Total lessons</label>
                                                                <input class="form-control" type="number" name="total_lessons"
                                                                       placeholder="Enter total lessons" value="{{ $course->total_lessons }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Course price</label>
                                                                <input type="number" class="form-control" name="price"
                                                                       placeholder="Enter course price" value="{{ $course->price }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Discount(%)</label>
                                                                <input class="form-control" type="number" name="discount" value="{{ $course->discount }}"
                                                                       placeholder="Enter discount">
                                                                <div class="col-12 mt-1 mb-0">
                                                                    <div class="form-check small mb-0">
                                                                        <input class="form-check-input" type="checkbox" id="checkBox1">
                                                                        <label class="form-check-label" for="checkBox1">
                                                                            Enable this Discount
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Add description</label>
                                                                <!-- Editor toolbar -->
                                                                <div class="bg-light border border-bottom-0 rounded-top py-3"
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

                                                                <div class="bg-body border rounded-bottom h-400px overflow-hidden"
                                                                     id="quilleditor">

                                                                </div>
                                                                <input type="hidden" name="description" id="description">
                                                            </div>

                                                            <!-- Tags START -->
                                                            <div class="col-12">
                                                                <h4>Additional Info</h4>
                                                                <hr>
                                                                <div class="bg-light border rounded p-4">
                                                                    <h5 class="mb-0">Tags</h5>
                                                                    <!-- Comment -->
                                                                    <div class="mt-3">
                                                                        <input type="text" name="tags" class="form-control js-choice mb-0"
                                                                               data-placeholder="true" data-placeholder-Val="Enter tags"
                                                                               data-max-item-count="14" data-remove-item-button="true">
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
                                                                <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                                                <button class="btn btn-primary next-btn mb-0">Next</button>
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

    <div class="modal fade" id="addLessons" tabindex="-1" aria-labelledby="addLessonsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addLessonsLabel">Add Lesson</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Course name -->
                        <div class="col-12">
                            <label class="form-label">Lesson name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lessonName" placeholder="Enter lesson name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal"
                            onclick="closeModal()">Close
                    </button>
                    <button type="button" class="btn btn-success my-0" onclick="addLesson()">Add Lesson</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup modal for add lesson END -->

    <!-- Popup modal for add topic START -->
    <div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" aria-hidden="true"
         style="--bs-modal-width: 900px !important;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addTopicLabel">Add an activity or resource</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body" style="background-color: #ececec;">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-blue"><i class="fa fa-book-reader text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Topic</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-green"><i class="fa fa-image text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Image</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-oceanblue"><i class="fa fa-video text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Video</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-red"><i class="fa fa-file-pdf text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">PDF</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-blue"><i class="fa fa-file-excel text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Excel</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-purple"><i class="fa fa-fingerprint text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Attendence</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-pink"><i class="fa fa-envelope text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Chat</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-yellow"><i class="fa fa-edit text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Manual Exam</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-purple"><i class="fa fa-quidditch text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Quiz</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('scorm-package.create') }}" data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-red"><i class="fa fa-archive text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Scorm Package</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup modal for add topic END -->

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
                <lottie-player id="progress-lottie" src="https://lottie.host/0b9b8d29-d7e8-47da-90ac-212fbe218032/H9trT3bcdK.json" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
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

            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    var progressBar = document.getElementById('progress-bar');
                    var progressText = document.getElementById('progress-text');

                    progressBar.style.width = percentComplete + '%';
                    progressText.style.color = 'white';
                    progressText.innerHTML = Math.round(percentComplete) + '%';
                }
            }, false);

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    window.location.href = '{{ route('course.index') }}';
                } else {
                    alert('An error occurred while submitting the form. Please try again.');
                    location.reload();
                    closeModal();
                }
            });

            xhr.addEventListener('error', function() {
                alert('An error occurred while submitting the form. Please try again.');
                closeModal();
            });

            xhr.addEventListener('abort', function() {
                alert('Form submission was aborted.');
                closeModal();
            });

            xhr.onreadystatechange = function() {
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
        function setModalTarget(counter) {
            currentLessonCounter = counter;
        }

        function addLesson() {
            const accordionDiv = document.getElementById('accordionExample2');
            const lessonName = document.getElementById('lessonName');
            lessonCounter++;
            const accordionId = `accordion-${lessonCounter}`;

            const lessonHtml = `
        <div class="accordion-item mb-3" id="${accordionId}">
            <h6 class="accordion-header font-base">
                <div class="row align-items-center">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="curriculum_names[]" value="${lessonName.value}" placeholder="Name of the lessons">
                </div>
                <div class="col-md-1">
                    <button class="accordion-button fw-bold rounded collapsed" style="width: 52px; margin-top: 5px;"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-${accordionDiv.children.length + 1}" aria-expanded="false"
                            aria-controls="collapse-${accordionDiv.children.length + 1}">
                    </button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic" onclick="removeCurriculum('${accordionId}')">
                    <i class="fas fa-fw fa-times"></i>
                </button>
                </div>
</div>
            </h6>

            <div id="collapse-${accordionDiv.children.length + 1}" class="accordion-collapse collapse"
                 data-bs-parent="#${accordionId}">

                <div class="accordion-body mt-3">

                    <div id="appendTopic${lessonCounter}">

                    </div>
                    <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic" onclick="setModalTarget(${lessonCounter})">
                        <i class="bi bi-plus-circle me-2"></i>Add an activity or resource
                    </a>
                </div>

            </div>
        </div>
    `;

            accordionDiv.innerHTML += lessonHtml;
            lessonName.value = '';
            closeModal();
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
        document.querySelectorAll('input[type="date"]').forEach(function(input) {
            input.addEventListener('click', function() {
                this.showPicker();
            });
        });
    </script>

    <script>
        function scromPackageDelete(scormPackageId) {
            let url = '/delete-scorm-package';
            let data = {
                ScormPackageId: scormPackageId,
            }
            axios.post(url, data).then(
                function (response) {
                    if(response.data === 1){
                        document.getElementById('eixstingScormPackage-'+scormPackageId).innerHTML = '';
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
