@extends('frontend-1.layout.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend-1\assets\css\exam-page-custom-style.css') }}">
@endpush
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
    <style>
        @media screen and (max-width: 767px) {
            .vertical-tabs {
                width: 50px;
            }
            .tab-question-title {
                display: none;
            }
            textarea {
                width: 100% !important;
            }
            .fill-in-the-blanks-option {
                white-space: normal !important;
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>

    <br>
    <main>
        <video id="videoElement" autoplay playsinline></video>
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <!-- Main content START -->
                    <div class="col-xl-12">

                        <!-- Course item START -->
                        <div class="card border shadow">

                            <div class="card-header border-bottom">
                                <!-- Course list START -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                    <img src="{{ asset($exam->course->image) }}" class="rounded-2"
                                                         alt="Card image">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="card-body">
                                                        <!-- Title -->
                                                        <h3 class="card-title"><a href="#">{{ $exam->name }} quiz</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-danger text-end mb-0"><i class="bi bi-clock-history me-2"></i><span
                                        id="timer">Quiz Time: {{ $exam->duration }}</span></h6>
                                <!-- Course list END -->
                            </div>

                            <div class="card-body">
                                <!-- Step content START -->
                                <div class="card bg-transparent rounded-3 mb-1">
                                    <div id="stepper" class="bs-stepper stepper-outline">

                                        <div class="tabs-container">
                                            <!-- Vertical Tabs -->
                                            <div class="vertical-tabs"
                                                 @if(sizeof($exam->questions) > 4) style="max-height: 370px; overflow-y: auto;" @endif>
                                                @foreach($exam->questions as $question)
                                                    <div class="tab"
                                                         onclick="showTab({{ $loop->iteration }})">{{ $loop->iteration }}
                                                        <span class="tab-question-title">. {{ $question->title }}</span></div>
                                                @endforeach
                                            </div>


                                            <!-- Tab Content -->
                                            <div class="tab-content border"
                                                 style="margin-left: 10px; border-radius:4px;" id="tab-content">
                                                <div align="center" style="margin-top: 15%;"><h6>Select a question from
                                                        leftside tabs to view its content.</h6></div>
                                                @foreach($exam->questions as $index => $question)
                                                    <div class="question-and-answer" align="center" id="tab{{ $loop->iteration }}"
                                                         style="display: none;">
                                                        <h2>{{ ucfirst(str_replace('-', ' ', strtolower($question->type))) }}</h2>
                                                        <p>{{ $question->title }}</p>
                                                        <span class="d-inline-block">
{{--                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">--}}
                                                                        @if($question->image)
                                                                <img src="{{ asset($question->image) }}" width="100px"
                                                                     height="100px">
                                                                <br><br>
                                                            @endif
                                                            @if($question->type === 'selection')
                                                                @foreach(json_decode($question->option) as $item)
                                                                    <p><input id="answer{{ $index+1 }}" name="answer" data-question-type="selection"
                                                                              value="{{ $item }}" type="radio"> {{ $item }}</p>
                                                                @endforeach
                                                            @elseif($question->type === 'multiple-choice')
                                                                @foreach(json_decode($question->option) as $item)
                                                                    <p><input id="answer{{ $index+1 }}" data-question-type="multiple-choice"
                                                                              value="{{ $item }}" type="checkbox"> {{ $item }}</p>
                                                                @endforeach
                                                            @elseif($question->type === 'fill-in-the-blanks')
                                                                                @php
                                                                                    $dash = substr_count($question->option, '___');
                                                                                    $option = $question->option;
                                                                                    $serialNumber = 1;
                                                                                    $option = preg_replace_callback('/___/', function() use (&$serialNumber) {
                                                                                        return '__' . $serialNumber++ . '__';
                                                                                    }, $option);
                                                                                @endphp
                                                                <p class="fill-in-the-blanks-option" style="white-space: normal !important;">
                                                                    {{ $option }}
                                                                </p>
                                                                                <hr>
                                                                <p><textarea id="answer{{ $loop->iteration }}" rows="10" data-question-type="fill-in-the-blanks"
                                                                             cols="50" style="border: none !important; outline: none !important;">
                                                                        @for($i=1; $i<$dash+1; $i++)
                                                                            {{ $i }}.
                                                                        @endfor
                                                                    </textarea></p>
                                                            @elseif($question->type === 'true/false')
                                                                <p>
                                                                            <input id="answer{{ $loop->iteration }}" name="answer" data-question-type="true/false"
                                                                                   value="true" type="radio"> True
                                                                            <br>
                                                                            <input id="answer{{ $loop->iteration }}" name="answer" data-question-type="true/false"
                                                                                   value="false" type="radio"> False
                                                                        </p>
                                                            @elseif($question->type === 'essay')
                                                                <p><textarea id="answer{{ $loop->iteration }}" rows="10" data-question-type="essay"
                                                                             cols="50"></textarea></p>
                                                            @elseif($question->type === 'short-answer')
                                                                <p><textarea id="answer{{ $loop->iteration }}" rows="10" data-question-type="short-answer"
                                                                             cols="50"></textarea></p>
                                                            @endif
                                                                        <div class="navigation-buttons">
                                                                            @if($loop->first)

                                                                            @else
                                                                                <button class="close-button-29"
                                                                                        id="previousButton"
                                                                                        onclick="previousTab({{ $loop->iteration-1 }})"><i
                                                                                        class="fas fa-arrow-left fa-fw"></i>Previous</button>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                            @endif
                                                                            @if($loop->last)
                                                                                <button class="button-29"
                                                                                        id="confirmNextButton"
                                                                                        onclick="confirmLastQuestion({{ $loop->iteration+1 }}, {{ $studentExamEnrollment->id }}, {{ $question->id }})">Confirm</button>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                                <button class="button-29"
                                                                                        id="finishButton"
                                                                                        onclick="finishExam({{ $loop->iteration+1 }}, {{ $studentExamEnrollment->id }}, {{ $question->id }})"><i
                                                                                        class="fas fa-database fa-fw"></i>Finish</button>
                                                                            @else
                                                                                <button class="button-29"
                                                                                        id="confirmNextButton"
                                                                                        onclick="confirmAndNextTab({{ $loop->iteration+1 }}, {{ $studentExamEnrollment->id }}, {{ $question->id }})">Save and Next<i
                                                                                        class="fas fa-arrow-right fa-fw"></i></button>
                                                                            @endif
                                                                            <br>
                                                                        </div>
                                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Course item END -->

                    </div>
                    <!-- Main content END -->
                </div> <!-- Row END -->
            </div>
        </section>
    </main>

    <div id="loaderContainer" class="loader-container" style="display: none;">
        <div id="loader" class="loader">
            <dotlottie-player src="https://lottie.host/e7693050-bb83-4c96-9a61-7530dbb53653/OiULX09tTZ.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>

        </div>
    </div>
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
        function showTab(tabNumber) {
            var tabContents = document.querySelectorAll('.tab-content > div');
            tabContents.forEach(function (content) {
                content.style.display = 'none';
            });
            document.getElementById('tab' + tabNumber).style.display = 'block';
            var tabs = document.querySelectorAll('.tab');
            tabs.forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.querySelector('.tab:nth-child(' + tabNumber + ')').classList.add('active');
        }

        function confirmAndNextTab(tabNumber, examEnrollmentId, questionId) {
            submitAnswer(tabNumber, examEnrollmentId, questionId);
            var tabContents = document.querySelectorAll('.tab-content > div');
            tabContents.forEach(function (content) {
                content.style.display = 'none';
            });
            document.getElementById('tab' + tabNumber).style.display = 'block';
            var tabs = document.querySelectorAll('.tab');
            tabs.forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.querySelector('.tab:nth-child(' + tabNumber + ')').classList.add('active');
        }

        function previousTab(tabNumber) {
            var tabContents = document.querySelectorAll('.tab-content > div');
            tabContents.forEach(function (content) {
                content.style.display = 'none';
            });
            document.getElementById('tab' + tabNumber).style.display = 'block';
            var tabs = document.querySelectorAll('.tab');
            tabs.forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.querySelector('.tab:nth-child(' + tabNumber + ')').classList.add('active');
        }

        function confirmLastQuestion(tabNumber, examEnrollmentId, questionId) {
            submitAnswer(tabNumber, examEnrollmentId, questionId);
        }

        function finishExam(tabNumber, examEnrollmentId, questionId) {
            submitAnswer(tabNumber, examEnrollmentId, questionId);
            window.location.href = '/';
        }
    </script>


    <script>
        function handleVisibilityChange() {
            if (document.hidden) {
                window.location.replace('/');
            }
        }

        document.addEventListener('visibilitychange', handleVisibilityChange);
        function replaceHistoryState() {
            if (window.location.pathname !== '/') {
                window.history.replaceState(null, '', '/');
            }
        }

        window.addEventListener('load', replaceHistoryState);
        const duration = {{ $exam->duration }} *
        60;
        const timerDisplay = document.getElementById('timer');
        let secondsLeft = duration;

        function updateTimerDisplay() {
            const minutes = Math.floor(secondsLeft / 60);
            const seconds = secondsLeft % 60;
            timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        function countdown() {
            updateTimerDisplay();
            if (secondsLeft <= 0) {
                clearInterval(timerInterval);
                timerDisplay.textContent = '00:00';
            } else {
                secondsLeft--;
            }
        }

        const timerInterval = setInterval(countdown, 1000);
    </script>

    <script>

        navigator.mediaDevices.getUserMedia({video: true})
            .then(function (stream) {
                const video = document.createElement('video');
                video.srcObject = stream;
                video.play();

                function checkUserLooking() {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    if (!userLookingAtScreen) {
                        window.location.replace('/');
                    }
                }

                setInterval(checkUserLooking, 1000);
            })
            .catch(function (err) {
                console.error('Error accessing webcam:', err);
            });
    </script>


    <script>
        navigator.mediaDevices.getUserMedia({video: true})
            .then(function (stream) {
                const video = document.getElementById('videoElement');
                video.srcObject = stream;
                video.play();
            })
            .catch(function (err) {
                console.error('Error accessing webcam:', err);
            });
    </script>
<script>
    function showLoader() {
        // Show loader
        document.getElementById('loaderContainer').style.display = 'flex';
    }

    // Function to hide loader
    function hideLoader() {
        // Hide loader
        document.getElementById('loaderContainer').style.display = 'none';
    }
</script>

    <script>
        function submitAnswer(tabNumber, examEnrollmentId, questionId) {
            showLoader()
            let answerElement = document.getElementById('answer' + (parseInt(tabNumber) - 1));
            let questionDataType = answerElement.getAttribute('data-question-type');

            let answer;
            if (questionDataType === 'selection') {
                const radioButtons = document.querySelectorAll('input[id="answer'+ (parseInt(tabNumber) - 1)+'"]');
                radioButtons.forEach(button => {
                    if (button.checked) {
                        answer = button.value ? button.value : '-';
                    }
                });
            }
            else if (questionDataType === 'multiple-choice') {
                let multipleChoices = [];
                const radioButtons = document.querySelectorAll('input[id="answer'+ (parseInt(tabNumber) - 1)+'"]');
                radioButtons.forEach(button => {
                    if (button.checked) {
                        multipleChoices.push(button.value)
                    }
                });
                answer = multipleChoices ? multipleChoices : '-';
            }
            else if (questionDataType === 'true/false') {
                const radioButtons = document.querySelectorAll('input[id="answer'+ (parseInt(tabNumber) - 1)+'"]');
                radioButtons.forEach(button => {
                    if (button.checked) {
                        answer = button.value ? button.value : '-';
                    }
                });
            }
            else if (questionDataType === 'fill-in-the-blanks' || questionDataType === 'essay' || questionDataType === 'short-answer'){
                answer = answerElement ? answerElement.value : '-';
            }

            let url = '/quiz-answer';
            let data = {
                ExamEnrollmentId: examEnrollmentId,
                QuestionId: questionId,
                Answer: answer,
            }
            axios.post(url, data).then(
                function (response) {
                    console.log(response.data)
                    hideLoader();
                }
            ).catch(
                function (error) {
                    hideLoader();
                }
            )
        }
    </script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
@endsection
