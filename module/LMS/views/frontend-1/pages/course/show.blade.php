@extends('frontend-1.layout.app')

@section('script')
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
    <main>
        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0"
                 style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="{{ asset($course->image) }}" width="100" height="auto">
                        <h1 class="text-white">{{ $course->title }}</h1>
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
                                        <h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 2 -->
                                <div class="step" data-target="#step-2">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                id="steppertrigger2" aria-controls="step-2">
                                            <span class="bs-stepper-circle">2</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Course media</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 3 -->
                                <div class="step" data-target="#step-3">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                id="steppertrigger3" aria-controls="step-3">
                                            <span class="bs-stepper-circle">3</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 4 -->
                                <div class="step" data-target="#step-4">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                id="steppertrigger4" aria-controls="step-4">
                                            <span class="bs-stepper-circle">4</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Resources</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Step Buttons END -->
                        </div>

                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Step content START -->
                            <div class="bs-stepper-content">
                                <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data"
                                      onsubmit="return false" id="course_form">
                                    @csrf
                                    <!-- Step 1 content START -->
                                    <div id="step-1" role="tabpanel" class="content fade"
                                         aria-labelledby="steppertrigger1">
                                        <!-- Title -->
                                        <h4>Course details</h4>

                                        <hr> <!-- Divider -->

                                        <!-- Basic information START -->
                                        <div class="row g-4">
                                            <!-- Course title -->
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Course title</label>
                                                <br>
                                                <span>{{ $course->title }}
                                                    <span style="font-size: 11px !important; font-weight: bold;">
                                                        @if($course->is_featured == 1)
                                                            <i class="fa fa-check-circle text-success"></i><label class="form-check-label" for="checkPrivacy1">Featured course</label>
                                                        @else
{{--                                                            <i class="fa fa-cross text-danger"></i><label class="form-check-label" for="checkPrivacy1">Not a featured course</label>--}}
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>

                                            <!-- Short description -->
                                            <div class="col-6">
                                                <label class="form-label fw-bold">Short description</label>
                                                <p>{{ $course->short_description }}</p>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label fw-bold">Date</label>
                                                <p>
                                                    <span>{{ Carbon\Carbon::parse($course->start_date)->format('jM Y') }}</span> - <span>{{ Carbon\Carbon::parse($course->end_date)->format('jM Y') }}</span>
                                                </p>

                                            </div>

                                            <!-- Course category -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Course category</label>
                                                <p>{{ $course->courseCategory->name }}</p>
                                            </div>

                                            <!-- Course level -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Course level</label>
                                                <p>{{ $course->courseLevel->name }}</p>
                                            </div>

                                            <!-- Language -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Language</label>
                                                <p>{{ $course->language }}</p>
                                            </div>

                                            <!-- Course time -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Course Duration(In Hour)</label>
                                                <p>{{ $course->duration }}</p>
                                            </div>

                                            <!-- Total lessons -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Total lessons</label>
                                                <p>{{ $course->total_lessons }}</p>
                                            </div>

                                            <!-- Course price -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Course price</label>
                                                <p>${{ $course->price }}</p>
                                            </div>

                                            <!-- Course discount -->
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Discount(%)</label>
                                                <p>{{ $course->discount }}</p>
                                            </div>

                                            <!-- Course description -->
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Description</label>
                                                <!-- Editor toolbar -->
                                                <p>
                                                    {!! $course->description !!}
                                                </p>
                                            </div>

                                            <!-- Step 1 button -->
                                            <div class="d-flex justify-content-end mt-3">
                                                <button class="btn btn-primary next-btn mb-0">Next</button>
                                            </div>
                                        </div>
                                        <!-- Basic information START -->
                                    </div>
                                    <!-- Step 1 content END -->

                                    <!-- Step 2 content START -->
                                    <div id="step-2" role="tabpanel" class="content fade"
                                         aria-labelledby="steppertrigger2">
                                        <!-- Title -->
                                        <h4>Course media</h4>

                                        <hr> <!-- Divider -->

                                        <div class="row">
                                            <!-- Upload image START -->
                                            <div class="col-12">
                                                <div
                                                    class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                                    <!-- Image -->
                                                    <img
                                                        src="{{ asset($course->image) }}" style="width: 200px; height: auto;" alt="">
                                                </div>

                                            </div>
                                            <!-- Upload image END -->

                                            <!-- Upload video START -->
                                            <div class="col-12">
                                                <!-- Input -->
                                                <div class="col-12 mt-4 mb-5">
                                                    <label class="form-label">Video URL Content</label>
                                                    <p><iframe width="320" height="260" src="{{ $course->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Upload Video Content</label>
                                                    <div class="input-group mb-3">
                                                        <video style="width: 320px; height: 260px;" controls>
                                                            <source src="{{ asset($course->video) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Upload video END -->

                                            <!-- Step 2 button -->
                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                                <button class="btn btn-primary next-btn mb-0">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Step 2 content END -->

                                    <!-- Step 3 content START -->
                                    <div id="step-3" role="tabpanel" class="content fade"
                                         aria-labelledby="steppertrigger3">
                                        <!-- Title -->
                                        <h4>Curriculum</h4>

                                        <hr> <!-- Divider -->

                                        <div class="row">
                                            <!-- Add Lessons Modal button -->
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                                <h5 class="mb-2 mb-sm-0">Lessons</h5>
                                            </div>

                                            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                                @foreach(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get() as $index => $curriculum)
                                                    <div class="accordion-item mb-3">
                                                        <h6 class="accordion-header font-base" id="heading-{{ $index }}">
                                                            <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}">
                                                                {{ $curriculum->name }}
                                                            </button>
                                                        </h6>

                                                        <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample2">
                                                            <!-- Topic START -->
                                                            <div class="accordion-body mt-3">
                                                                <!-- Video item START -->
                                                                @foreach(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->get() as $topic)
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative">
                                                                            <span class="btn btn-info-soft btn-round btn-sm mb-0 position-static"><i class="fas fa-file"></i></span>
                                                                            <span class="ms-2 mb-0 h6 fw-light">{{ $topic->name }}</span>
                                                                            <br><br>
                                                                            <p style="font-size: 12px;">{{ $topic->description }}</p>
                                                                            <br>
                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'image')->get() as $learningResource)
                                                                                <div class="text-center">
                                                                                    <img src="{{ asset($learningResource->link) }}" width="700px" height="auto">
                                                                                </div>
                                                                            @endforeach
                                                                            <br>
                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'video')->get() as $learningResource)
                                                                                <div class="d-flex justify-content-center align-items-center">
                                                                                    <video style="width: 700px; height: 260px;" controls>
                                                                                        <source src="{{ asset($learningResource->link) }}" type="video/mp4">
                                                                                        Your browser does not support the video tag.
                                                                                    </video>
                                                                                </div>
                                                                            @endforeach
                                                                            <br>
                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'url')->get() as $learningResource)
                                                                                <div class="text-center">
                                                                                    <iframe width="700" height="260" src="{{ asset($learningResource->link) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                                </div>
                                                                            @endforeach
                                                                            <br>
                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'document')->get() as $learningResource)
                                                                                <iframe src="{{ asset($learningResource->link) }}" width="100%" height="600px"></iframe>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <!-- Divider -->
                                                                    <hr>
                                                                @endforeach
                                                                <!-- Video item END -->
                                                            </div>
                                                            <!-- Topic END -->
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Edit lecture END -->

                                            <!-- Step 3 button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                                <button class="btn btn-primary next-btn mb-0">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Step 3 content END -->

                                    <!-- Step 4 content START -->
                                    <div id="step-4" role="tabpanel" class="content fade"
                                         aria-labelledby="steppertrigger4">
                                        <!-- Title -->
                                        <h4>Course Resources & Additional Info</h4>

                                        <hr> <!-- Divider -->

                                        <div class="row g-4">

                                            <!--Scorm Package-->
                                            <div class="col-12">
                                                <div class="bg-light border rounded p-4">
                                                    <h5 class="mb-0">Learning Resource</h5>
                                                    <!-- Comment -->
                                                    <div class="mt-3">
                                                        @foreach($course->courseScormPackages as $course->courseScormPackage)
                                                            <span>{{ $loop->iteration }}. <span>{{ $course->courseScormPackage->link }}</span> &nbsp;&nbsp;&nbsp; <a href="/scorm/{{ $course->courseScormPackage->link }}" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-box-open"></i> OPEN</a></span> <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tags START -->
                                            <div class="col-12">
                                                <div class="bg-light border rounded p-4">
                                                    <h5 class="mb-0">Tags</h5>
                                                    <!-- Comment -->
                                                    <div class="mt-3">
                                                        @php
                                                            $tags = json_decode($course->tags, true);
                                                        @endphp

                                                        @if(is_array($tags) && count($tags) > 0)
                                                            <ul class="list-inline" style="list-style-type: none;">
                                                                @foreach($tags as $tag)
                                                                    <li class="list-inline-item" style="background-color: #262626; color: #ffffff; border-radius: 4px;">&nbsp;{{ $tag }}&nbsp;</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>No tags available</span>
                                                        @endif
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
                                                        <p>{{ $course->prerequisites }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Reviewer START -->

                                            <!-- Step 4 button -->
                                            <div class="d-md-flex justify-content-between align-items-start mt-4">
                                                <button class="btn btn-secondary prev-btn mb-2 mb-md-0">Previous
                                                </button>
                                                {{--                                                <button class="btn btn-light me-auto ms-md-2 mb-2 mb-md-0">Preview--}}
                                                {{--                                                    Course--}}
                                                {{--                                                </button>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Step 4 content END -->

                                </form>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Steps END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->


    <!-- Popup modal for add lesson START -->
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
                    <h5 class="modal-title text-white" id="addTopicLabel">Add topic</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Topic name -->
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="topicName" placeholder="Enter topic name">
                        </div>
                        <!-- Video link -->
                        <div class="col-md-6">
                            <label class="form-label">Video link</label>
                            <input class="form-control" type="text" id="topicVideoLink" placeholder="Enter Video link">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Upload Image <i class="fa fa-image"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(JPG format only)</span></label>
                            <input class="form-control" type="file" id="topicImage" placeholder="Enter Video link">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Upload Video <i class="fa fa-video"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(MP4 format only)</span></label>
                            <input class="form-control" type="file" id="topicVideo" placeholder="Enter Video link">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Upload Document <i class="fa fa-file-pdf"></i> <span style="font-size: 10px; color: indianred; font-style: italic;">(PDF format only)</span></label>
                            <input class="form-control" type="file" id="topicDocument" placeholder="Enter Video link">
                        </div>
                        <!-- Description -->
                        <div class="col-12 mt-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="topicDescription" rows="4" placeholder="" spellcheck="false"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success my-0" onclick="addTopic()">Add topic</button>
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

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        function submitForm() {
            let form = document.getElementById('course_form');
            quillEditorDataTaken();
            form.submit();
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
        let lessonCounter = 0;
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
                <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-${accordionDiv.children.length + 1}" aria-expanded="false"
                        aria-controls="collapse-${accordionDiv.children.length + 1}">
                    <input type="text" class="form-control" name="curriculum_names[]" value="${lessonName.value}" placeholder="Name of the lessons">
                </button>
            </h6>

            <div id="collapse-${accordionDiv.children.length + 1}" class="accordion-collapse collapse"
                 data-bs-parent="#${accordionId}">
                <!-- Topic START -->
                <div class="accordion-body mt-3">
                    <!-- Video item START -->
                    <div id="appendTopic${lessonCounter}">

                    </div>
                    <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic" onclick="setModalTarget(${lessonCounter})">
                        <i class="bi bi-plus-circle me-2"></i>Add topic
                    </a>
                </div>
                <!-- Topic END -->
            </div>
        </div>
    `;

            accordionDiv.innerHTML += lessonHtml;
            lessonName.value = '';
            closeModal();
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
            const topicDescription = document.getElementById('topicDescription');
            const topicVideoLink = document.getElementById('topicVideoLink');
            const topicImage = document.getElementById('topicImage').files[0];
            const topicVideo = document.getElementById('topicVideo').files[0];
            const topicDocument = document.getElementById('topicDocument').files[0];
            const lessonName = document.getElementById(`accordion-${currentLessonCounter}`).querySelector('input[name="curriculum_names[]"]').value;
            const reader = new FileReader();

            const files = [topicImage, topicVideo, topicDocument];
            const promises = files.map(file => readFileAsBase64(file));
            Promise.all(promises).then(([base64Image, base64Video, base64Document]) => {
                const topicHtml = `
        <div class="topic-item d-flex justify-content-between align-items-center">
            <div class="position-relative">
                <a href="#" class="btn btn-info-soft btn-round btn-sm mb-0 stretched-link position-static">
                    <i class="fas fa-file"></i>
                </a>
                <input class="ms-2 mb-0 h6 fw-light" type="text" name="topic_names[${lessonName}][]" value="${topicName.value}" readonly style="border: none !important;">
                <input type="hidden" name="topic_descriptions[${lessonName}][]" value="${topicDescription.value}" placeholder="Enter description" class="form-control description-input">
                <input type="hidden" name="topic_video_links[${lessonName}][]" value="${topicVideoLink.value}" placeholder="Enter description" class="form-control description-input">
                <input type="hidden" name="topic_images[${lessonName}][]" value="${base64Image}" placeholder="Enter description" class="form-control description-input">
                <input type="hidden" name="topic_videos[${lessonName}][]" value="${base64Video}" placeholder="Enter description" class="form-control description-input">
                <input type="hidden" name="topic_documents[${lessonName}][]" value="${base64Document}" placeholder="Enter description" class="form-control description-input">
            </div>
            <div>
                <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic">
                    <i class="fas fa-fw fa-times"></i>
                </button>
            </div>
        </div>
        <hr>
    `;
                topicName.value = '';
                topicDescription.value = '';
                topicVideoLink.value = '';
                document.getElementById('topicImage').value = '';
                document.getElementById('topicVideo').value = '';
                document.getElementById('topicDocument').value = '';
                targetDiv.innerHTML += topicHtml;

                // Add event listener to the delete button
                const deleteButtons = document.querySelectorAll('.delete-topic');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        this.parentElement.parentElement.remove(); // Remove the topic div
                    });
                });

                var modal = document.getElementById('addTopic');
                var bootstrapModal = bootstrap.Modal.getInstance(modal);
                bootstrapModal.hide();
            });
            function readFileAsBase64(file) {
                return new Promise((resolve, reject) => {
                    if (!file) {
                        resolve(null);
                    }
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        resolve(event.target.result);
                    };
                    reader.onerror = (error) => {
                        reject(error);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }


    </script>
@endsection
