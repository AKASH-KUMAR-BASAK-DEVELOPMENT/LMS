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
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12">
                        <section class="bg-blue rounded">
                            <div class="container">
                                <div class="row justify-content-lg-between m-2">

                                    <div class="col-lg-8">
                                        <!-- Title -->
                                        <h1 class="text-white">{{ $course->title }}</h1>
                                        <p class="text-white">{{ $course->short_description }}</p>

                                        <!-- Content -->
                                        <ul class="list-inline mb-5">
                                            <li class="list-inline-item h6 me-4 mb-1 mb-sm-0 text-white"><span class="fw-light">By</span> {{ $course->createdBy->name }}</li>
                                            <li class="list-inline-item me-4 mb-1 mb-sm-0">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                                    <li class="list-inline-item ms-2 h6 text-white">4.5/5.0</li>
                                                    {{--                                    <li class="list-inline-item text-white">(1,586 reviews)</li>--}}
                                                </ul>
                                            </li>
                                            <li class="list-inline-item h6 mb-0 text-white"><i class="fas fa-globe text-info me-2"></i>English</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3">
                                        <h6 class="text-white lead fw-light mb-3"><i class="fas fa-user-graduate text-orange me-2"></i>{{ totalUsersOfSpecificCourseEnrolled($course->id) }} already enrolled</h6>
                                            <a class="btn btn-warning mb-3" onclick="alert('Result Card unavailable!')">Result Card</a>
                                    <!-- Progress item -->
                                        <div class="overflow-hidden mb-4">
                                            <h6 class="text-white">Your Progress</h6>
                                            @php
                                                $totalCurriculum = sizeOf(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get());
                                                $totalCompleteCurriculum = sizeOf(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->where('is_completion', '1')->get());
                                            @endphp
                                            <div class="progress progress-sm bg-white bg-opacity-10 mb-1">
                                                <div class="progress-bar bg-white aos aos-init aos-animate" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: @if ($totalCurriculum > 0) {{ ($totalCompleteCurriculum / $totalCurriculum) * 100 }}%; @endif" aria-valuenow="@if ($totalCurriculum > 0) {{ ($totalCompleteCurriculum / $totalCurriculum) * 100 }} @endif" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="text-white">{{ $totalCompleteCurriculum }} of {{ $totalCurriculum }} Completed</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                        <section class="pt-0">
                            <div class="container">
                                <div class="row">
                                    <!-- Main content START -->
                                    <div class="col-12">
                                        <div class="card shadow rounded-2 p-0 mt-n5">
                                            <!-- Tabs START -->
                                            <div class="card-header border-bottom px-4 pt-3 pb-0">
                                                <ul class="nav nav-bottom-line py-0" id="course-pills-tab" role="tablist">
                                                    <!-- Tab item -->
                                                    <li class="nav-item me-2 me-sm-4" role="presentation">
                                                        <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="true">Course Materials</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Tabs END -->

                                            <!-- Tab contents START -->
                                            <div class="card-body p-sm-4">
                                                <div class="tab-content" id="course-pills-tabContent">
                                                    <!-- Content START -->
                                                    <div class="tab-pane fade active show" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                                        <!-- Accordion START -->
                                                        <div class="accordion accordion-icon accordion-border" id="accordionExample2">
                                                            @foreach(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get() as $index => $curriculum)
                                                                <div class="accordion-item mb-3">
                                                                    <h6 class="accordion-header font-base" id="heading-{{ $index }}">
                                                                        <button class="accordion-button fw-bold rounded d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}" title="{{ sizeof($curriculum->curriculumTopics->where('type', 'topic')) }} Topic, {{ sizeof($curriculum->curriculumScormPackage) }} Scorm Package, {{ sizeof($curriculum->curriculumTopics->where('type', 'image')) }} Image, {{ sizeof($curriculum->curriculumTopics->where('type', 'video')) }} Video, {{ sizeof($curriculum->curriculumTopics->where('type', 'pdf')) }} PDF, {{ sizeof($curriculum->curriculumTopics->where('type', 'excel')) }} Excel">
                                                                            {{ $curriculum->name }}

                                                                            <!-- Mark button -->
                                                                            <span class="text-secondary ms-auto pe-4" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as completed" data-bs-original-title="Mark as completed">
													<i class="bi bi-check-circle-fill @if($curriculum->is_completion == 1) text-success @endif" id="completion-marking"></i>
												</span>
                                                                        </button>
                                                                    </h6>

                                                                    <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample2">
                                                                        <!-- Topic START -->
                                                                        <div class="accordion-body border rounded mt-3 mb-1">
                                                                            <!-- Video item START -->
                                                                            @foreach(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->get() as $topic)
                                                                                <div class="d-flex justify-content-between align-items-center border rounded p-2">
                                                                                    <div class="position-relative">
                                                                                        <span class="btn btn-info-soft btn-round btn-sm mb-0 position-static"><i class="fas fa-file"></i></span>
                                                                                        <span class="ms-2 mb-0 h6 fw-light">{{ $topic->name }}</span>
                                                                                        <br><br>
                                                                                        <p style="font-size: 12px;">{{ $topic->description }}</p>
                                                                                        <br>
                                                                                        <div class="d-flex flex-wrap">
                                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'image')->get() as $learningResource)
                                                                                                @if($learningResource->link)
                                                                                                    <div class="text-center">
                                                                                                        <button class="btn btn-info" onclick="openImageModal('{{ asset($learningResource->link) }}')">View Image <i class="fa fa-image"></i> </button>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                            &nbsp;&nbsp;
                                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'video')->get() as $learningResource)
                                                                                                @if(file_exists($learningResource->link))
                                                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                                                        <button class="btn btn-info" onclick="openVideoModal('{{ asset($learningResource->link) }}')">View Video <i class="fa fa-play"></i></button>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                            &nbsp;&nbsp;
                                                                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'document')->get() as $learningResource)
                                                                                                @if(file_exists($learningResource->link))
                                                                                                    <button class="btn btn-info" onclick="openIframeModal('{{ asset($learningResource->link) }}')">View PDF <i class="fa fa-file-pdf"></i></button>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Divider -->
                                                                                <hr>
                                                                        @endforeach
                                                                            <div class="p-1">
                                                                                <div class="mt-0">
                                                                                    <ol>
                                                                                        @foreach(\Module\LMS\Models\ScormPackageModel::where('curriculum_id', $curriculum->id)->get() as $courseScormPackage)
                                                                                            <li><span><i class="fa fa-archive text-success"></i> &nbsp; <a href="/scorm/{{ $courseScormPackage->link }}" target="_blank" class="text-decoration-none text-reset"><span>{{ $courseScormPackage->link }}</span></a></span></li>
                                                                                        @endforeach
                                                                                    </ol>
                                                                                </div>
                                                                            </div>
                                                                            <div class="p-1">
                                                                                <div class="mt-0">
                                                                                    <ol>
                                                                                        @foreach(\Module\LMS\Models\CourseAssessmentModel::where('curriculum_id', $curriculum->id)->get() as $assessment)
                                                                                            <li><span><i class="fa fa-box-open text-info"></i> &nbsp; <a href="{{ route('course-assessment.show', $assessment->id)  }}" target="_blank" class="text-decoration-none text-reset"><span>{{ $assessment->title }}</span></a></span></li>
                                                                                        @endforeach
                                                                                    </ol>
                                                                                </div>
                                                                            </div>
                                                                        <!-- Video item END -->
                                                                        </div>
                                                                        <!-- Topic END -->
                                                                        <div class="row"><button class="btn btn-success" onclick="curriculumCompleteMark({{ $curriculum->id }})"><i class="fa fa-check-circle"></i> Mark As Complete</button></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Accordion END -->
                                                    </div>
                                                    <!-- Content END -->

                                                </div>
                                            </div>
                                            <!-- Tab contents END -->
                                        </div>
                                    </div>
                                    <!-- Main content END -->
                                </div><!-- Row END -->
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

    <script>
        function curriculumCompleteMark(curriculum_id) {
            let url = '/curriculum-completion-mark';
            let data = {
                CurriculumId: curriculum_id,
            }
            axios.post(url, data).then(
                function (response) {
                    location.reload();
                }
            ).catch(
                function (error) {
                    //
                }
            )
        }
    </script>

    <script>
        function openImageModal(imageSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var image = document.createElement('img');
            image.src = imageSrc;
            image.style.maxWidth = '80%';
            image.style.maxHeight = '80%';
            modal.appendChild(closeButton);
            modal.appendChild(image);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>

    <script>
        function openVideoModal(videoSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var video = document.createElement('video');
            video.style.maxWidth = '80%';
            video.style.maxHeight = '80%';
            video.controls = true;
            var source = document.createElement('source');
            source.src = videoSrc;
            source.type = 'video/mp4';
            video.appendChild(source);
            modal.appendChild(closeButton);
            modal.appendChild(video);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>

    <script>
        function openIframeModal(iframeSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var iframe = document.createElement('iframe');
            iframe.src = iframeSrc;
            iframe.style.width = '80%';
            iframe.style.height = '80%';
            iframe.style.border = 'none';
            modal.appendChild(closeButton);
            modal.appendChild(iframe);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>
@endsection
