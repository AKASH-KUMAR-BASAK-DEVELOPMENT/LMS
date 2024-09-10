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

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12">
                        <!-- =======================
        Page Banner START -->
                        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0"
                                 style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
                            <!-- Main banner background image -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <!-- Title -->
                                        <h1 class="text-white">Submit a new Quiz</h1>
                                        <p class="text-white mb-0">This quiz is associated with a specific course</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- =======================
                        Page Banner END -->

                        <!-- =======================
                        Steps START -->
                        <section>
                            <div class="container">
                                <div class="card bg-transparent border rounded-3 mb-5">
                                    <div id="stepper" class="bs-stepper stepper-outline">
                                        <!-- Card header -->
                                        <div class="card-header bg-light border-bottom px-lg-5">
                                            <!-- Step Buttons START -->
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- Step 1 -->
                                                <div class="step" data-target="#step-1">
                                                    <div class="d-grid text-center align-items-center">
                                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                                id="steppertrigger1" aria-controls="step-1">
                                                            <span class="bs-stepper-circle">1</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Quiz details</h6>
                                                    </div>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step-3">
                                                    <div class="d-grid text-center align-items-center">
                                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                                                id="steppertrigger3" aria-controls="step-3">
                                                            <span class="bs-stepper-circle">2</span>
                                                        </button>
                                                        <h6 class="bs-stepper-label d-none d-md-block">Questions</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Step Buttons END -->
                                        </div>

                                        <!-- Card body START -->
                                        <div class="card-body">
                                            <!-- Step content START -->
                                            <div class="bs-stepper-content">
                                                <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data"
                                                      onsubmit="return false" id="exam_form">
                                                @csrf
                                                    <input type="hidden" name="curriculum_id" value="{{ $curriculum->id }}">
                                                    @if($folder)
                                                        <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                                                    @endif
                                                    <input type="hidden" name="course_id" value="{{ $curriculum->course->id }}">
                                                <!-- Step 1 content START -->
                                                    <div id="step-1" role="tabpanel" class="content fade"
                                                         aria-labelledby="steppertrigger1">
                                                        <!-- Title -->
                                                        <h4>Quiz details</h4>

                                                        <hr> <!-- Divider -->

                                                        <!-- Basic information START -->
                                                        <div class="row g-4">
                                                            <!-- Course title -->
                                                            <div class="col-8">
                                                                <label class="form-label">Exam name</label>
                                                                <input class="form-control" type="text" name="name"
                                                                       placeholder="Enter exam name">
                                                            </div>

                                                            <div class="col-4">
                                                                <label class="form-label">Date</label>
                                                                <input class="form-control" type="date" name="date"
                                                                       placeholder="Enter exam date">
                                                            </div>

                                                            <!-- Course time -->
                                                            <div class="col-md-4">
                                                                <label class="form-label">Duration(Minute)</label>
                                                                <input class="form-control" type="number" name="duration"
                                                                       placeholder="Enter duration">
                                                            </div>

                                                            <!-- Course passed mark -->
                                                            <div class="col-md-4">
                                                                <label class="form-label">Pass Mark</label>
                                                                <input class="form-control" type="number" name="pass_mark"
                                                                       placeholder="Enter pass mark">
                                                            </div>

                                                            <!-- Step 1 button -->
                                                            <div class="d-flex justify-content-end mt-3">
                                                                <button class="btn btn-primary next-btn mb-0">Next</button>
                                                            </div>
                                                        </div>
                                                        <!-- Basic information START -->
                                                    </div>
                                                    <!-- Step 1 content END -->

                                                    <!-- Step 3 content START -->
                                                    <div id="step-3" role="tabpanel" class="content fade"
                                                         aria-labelledby="steppertrigger3">
                                                        <!-- Title -->
                                                        <h4>Questions</h4>
                                                        <div class="col-lg-12">
                                                            <div class="card shadow rounded-2 p-0">
                                                                <div class="card-header border-bottom px-4 py-3">
                                                                    <ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">

                                                                        <li class="nav-item me-2 me-sm-4" role="presentation">
                                                                            <button class="btn btn-info-soft mb-2 mb-md-0" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="true" onclick="addQuestion('True/False')">True/False</button>
                                                                        </li>

                                                                        <li class="nav-item me-2 me-sm-4" role="presentation">
                                                                            <button class="btn btn-info-soft mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-3" type="button" role="tab" aria-controls="course-pills-3" aria-selected="false" tabindex="-1" onclick="addQuestion('Fill in the blanks')">Fill in the blanks</button>
                                                                        </li>

                                                                        <li class="nav-item me-2 me-sm-4" role="presentation">
                                                                            <button class="btn btn-info-soft mb-2 mb-md-0" id="course-pills-tab-6" data-bs-toggle="pill" data-bs-target="#course-pills-6" type="button" role="tab" aria-controls="course-pills-6" aria-selected="false" tabindex="-1" onclick="addQuestion('Multiple Choice')">Multiple Choice</button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr> <!-- Divider -->

                                                        <div class="row">

                                                            <!-- Edit lecture START -->
                                                            <div class="accordion accordion-icon accordion-bg-light"
                                                                 id="accordionExample2">

                                                            </div>
                                                            <!-- Edit lecture END -->

                                                            <!-- Step 3 button -->
                                                            <div class="d-flex justify-content-between">
                                                                <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                                                <button type="submit" class="btn btn-success mb-2 mb-sm-0"
                                                                        onclick="submitForm()">Submit a Quiz
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Step 3 content END -->
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
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- **************** MAIN CONTENT END **************** -->



    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        function submitForm() {
            let form = document.getElementById('exam_form');
            if (form.checkValidity()) {
                form.submit();
            } else {
                // Optionally, you can display an error message or handle the validation failure in some other way.
            }
        }
    </script>

    <script>
        let lessonCounter = 0;
        let currentLessonCounter = 0;
        function setModalTarget(counter) {
            currentLessonCounter = counter;
        }

        function addQuestion(questionType) {
            // var embeddedQuestionType = questionTypeHtmlEmbedded(questionType);
            const accordionDiv = document.getElementById('accordionExample2');
            lessonCounter++;
            const accordionId = `accordion-${lessonCounter}`;

            const lessonHtml = `
        <div class="accordion-item mb-3" id="${accordionId}">
            <h6 class="accordion-header font-base">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        ${questionType}
                        <input type="hidden" class="form-control" name="type${lessonCounter}" value="${questionType}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="question[${lessonCounter}][]" value="" placeholder="Question" required>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="mark${lessonCounter}" value="" placeholder="Mark" required>
                    </div>
                    <div class="col-md-1">
                        <button class="accordion-button btn btn-primary fw-bold rounded" style="width: 52px; margin-top: 5px;"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-${accordionDiv.children.length + 1}" aria-expanded="false"
                                aria-controls="collapse-${accordionDiv.children.length + 1}">
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic" onclick="removeQuestion('${accordionId}')">
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
                    <div class="col-lg-12">
                        ${questionTypeHtmlEmbedded(questionType, lessonCounter)}
                    </div>
                </div>
            </div>
        </div>
    `;

            accordionDiv.insertAdjacentHTML('afterbegin', lessonHtml);
        }


        function removeQuestion(accordionId) {
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
        function questionTypeHtmlEmbedded(activeQuestionType, lessonCounter){
            const trueFalseEmbedded = `<div class="card shadow rounded-2 p-0">
                <div class="card-header border-bottom px-4 py-3">

                            <h6 class="mb-3">A True and False radio button default by added In this question's answer sheet</h6>
                            <div class="bg-light border rounded p-2">
                                                    <h5 class="mb-0">Answer</h5>
                                        <div class="mt-3">
                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
                                            <input type="radio" name="answer${lessonCounter}" value="true"> True
                                            <input type="radio" name="answer${lessonCounter}" value="false"> False
                                        </div>
                                        </div>
                                    </div>


                </div>
            </div>`;
            const selectionEmbedded = `<div class="card shadow rounded-2 p-0">


                <div class="card-body p-4">
                    <div class="tab-content pt-2" id="course-pills-tabContent">
                        <div class="tab-pane fade active show" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">

                    <div id="appendSelectionOption${lessonCounter}">
                                <input type="text" class="col-lg-6" name="option1${lessonCounter}" id="option1${lessonCounter}" placeholder="Enter option 1" required> <input type="radio" name="option${lessonCounter}" onclick="updateAnswer(${lessonCounter}, 'option1${lessonCounter}')"><br><br>
                                <input type="text" class="col-lg-6" name="option2${lessonCounter}" id="option2${lessonCounter}" placeholder="Enter option 2" required> <input type="radio" name="option${lessonCounter}" onclick="updateAnswer(${lessonCounter}, 'option2${lessonCounter}')"><br><br>
                                <input type="text" class="col-lg-6" name="option3${lessonCounter}" id="option3${lessonCounter}" placeholder="Enter option 3" required> <input type="radio" name="option${lessonCounter}" onclick="updateAnswer(${lessonCounter}, 'option3${lessonCounter}')"><br><br>
                                <input type="text" class="col-lg-6" name="option4${lessonCounter}" id="option4${lessonCounter}" placeholder="Enter option 4" required> <input type="radio" name="option${lessonCounter}" onclick="updateAnswer(${lessonCounter}, 'option4${lessonCounter}')"><br><br>

                    </div>
                                <button class="btn btn-info-soft" onclick="addMoreOptionSelection(event, ${lessonCounter})">Add More Option</button>
                        </div>
                                    <div class="bg-light border rounded p-2">
                                                    <h5 class="mb-0">Answer</h5>
                                        <div class="mt-3">
                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
                                            <input type="text" name="answer${lessonCounter}" id="answer${lessonCounter}" class="form-control" placeholder="Answer..." readonly>
                                        </div>
                                        <span class="small">Maximum 1 answer defined for a selection question</span>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>`;
            const fillInTheBlanksEmbedded = `<div class="card shadow rounded-2 p-0">


                <div class="card-body p-4">
                    <div class="tab-content pt-2" id="course-pills-tabContent">
                        <div class="tab-pane fade active show" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">

                            <div class="col-12">
                                <label class="form-label">Description of fill in the blanks <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" name="fillInTheBlanks${lessonCounter}" id="lessonName" placeholder="Write here"></textarea>
                                <br>
                                <button class="btn btn-info-soft" onclick="addDash()">Add Dash</button>
                            </div>
                        </div>
                                <div class="bg-light border rounded p-2">
                                                    <h5 class="mb-0">Answer</h5>
                                        <div class="mt-3">
                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
                                            <input type="text" name="answer${lessonCounter}" id="answer${lessonCounter}" class="form-control" placeholder="Answer...">
                                        </div>
                                        <span class="small">Serially type answer of every blanks and between 2 answer give comma(,)</span>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>`;
            const multipleChoiceEmbedded = `<div class="card shadow rounded-2 p-0">
                <div class="card-header border-bottom px-4 py-3">
                    <ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">

                        <li class="nav-item me-2 me-sm-4" role="presentation">
                            <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="true">Multiple Choice</button>
                        </li>
                    </ul>

                </div>

                <div class="card-body p-4">
                    <div class="tab-content pt-2" id="course-pills-tabContent">
                        <div class="tab-pane fade active show" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                            <strong>Image Upload:</strong> <input type="file" name="image${lessonCounter}">
                            <br><br><br>
                    <div id="appendMultipleChoiceOption${lessonCounter}">
                                <input type="text" class="col-lg-6" id="option1${lessonCounter}" name="option1${lessonCounter}" placeholder="Enter option 1" required> <input type="checkbox" name="option${lessonCounter}" onclick="updateMultipleChoiceAnswer(${lessonCounter})"><br><br>
                                <input type="text" class="col-lg-6" id="option2${lessonCounter}" name="option2${lessonCounter}" placeholder="Enter option 2" required> <input type="checkbox" name="option${lessonCounter}" onclick="updateMultipleChoiceAnswer(${lessonCounter})"><br><br>
                                <input type="text" class="col-lg-6" id="option3${lessonCounter}" name="option3${lessonCounter}" placeholder="Enter option 3" required> <input type="checkbox" name="option${lessonCounter}" onclick="updateMultipleChoiceAnswer(${lessonCounter})"><br><br>
                                <input type="text" class="col-lg-6" id="option4${lessonCounter}" name="option4${lessonCounter}" placeholder="Enter option 4" required> <input type="checkbox" name="option${lessonCounter}" onclick="updateMultipleChoiceAnswer(${lessonCounter})"><br><br>


                    </div>
                                <button class="btn btn-info-soft" onclick="addMoreOptionMultipleChoice(event, ${lessonCounter})">Add More Option</button>
                        </div>
                                <div class="bg-light border rounded p-2">
                                                    <h5 class="mb-0">Answer</h5>
                                        <div class="mt-3">
                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
                                            <input type="text" name="answer${lessonCounter}" id="answer${lessonCounter}" class="form-control" placeholder="Answer..." readonly>
                                        </div>
                                        <span class="small">Multiple answer defined for a multiple choice question</span>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>`;
            if(activeQuestionType === 'True/False'){
                return trueFalseEmbedded;
            }
            if(activeQuestionType === 'Selection'){
                return selectionEmbedded;
            }
            if(activeQuestionType === 'Fill in the blanks'){
                return fillInTheBlanksEmbedded;
            }
            if(activeQuestionType === 'Multiple Choice'){
                return multipleChoiceEmbedded;
            }
            return trueFalseEmbedded;
        }


        function addDash() {
            var textarea = document.getElementById("lessonName");
            var startPos = textarea.selectionStart;
            var endPos = textarea.selectionEnd;
            var text = textarea.value;
            var newText = text.substring(0, startPos) + "___" + text.substring(endPos, text.length);
            textarea.value = newText;
            textarea.selectionStart = startPos + 3;
            textarea.selectionEnd = startPos + 3;
            textarea.focus();
        }
        function updateAnswer(lessonCounter, optionId) {
            const optionText = document.getElementById(optionId).value;
            document.getElementById(`answer${lessonCounter}`).value = optionText;
        }
        function updateMultipleChoiceAnswer(lessonCounter) {
            const checkboxes = document.querySelectorAll(`input[name="option${lessonCounter}"]:checked`);
            const answers = Array.from(checkboxes).map(checkbox => checkbox.previousElementSibling.value);
            document.getElementById(`answer${lessonCounter}`).value = answers.join(', ');
        }
    </script>

    <script>
        function addMoreOptionSelection(event, lessonCounter) {
            event.preventDefault();
            const appendSelectionOptionDiv = document.getElementById(`appendSelectionOption${lessonCounter}`);
            const newOptionNumber = appendSelectionOptionDiv.querySelectorAll('input[type="text"]').length + 1;
            const newOptionHtml = `
        <input type="text" class="col-lg-6" name="option${newOptionNumber}${lessonCounter}" id="option${newOptionNumber}${lessonCounter}" placeholder="Enter option ${newOptionNumber}" required>
        <input type="radio" name="option${lessonCounter}" onclick="updateAnswer(${lessonCounter}, 'option${newOptionNumber}${lessonCounter}')"><br><br>`;
            appendSelectionOptionDiv.insertAdjacentHTML('beforeend', newOptionHtml);
        }
        function addMoreOptionMultipleChoice(event, lessonCounter) {
            event.preventDefault();
            const appendSelectionOptionDiv = document.getElementById(`appendMultipleChoiceOption${lessonCounter}`);
            const newOptionNumber = appendSelectionOptionDiv.querySelectorAll('input[type="text"]').length + 1;
            const newOptionHtml = `
            <input type="text" class="col-lg-6" id="option${newOptionNumber}${lessonCounter}" name="option${newOptionNumber}${lessonCounter}" placeholder="Enter option ${newOptionNumber}" required>
            <input type="checkbox" name="option${lessonCounter}" onclick="updateMultipleChoiceAnswer(${lessonCounter})"><br><br>`;
            appendSelectionOptionDiv.insertAdjacentHTML('beforeend', newOptionHtml);
        }

    </script>

    <script>
        document.querySelectorAll('input[type="date"]').forEach(function(input) {
            input.addEventListener('click', function() {
                this.showPicker();
            });
        });
    </script>
@endsection
