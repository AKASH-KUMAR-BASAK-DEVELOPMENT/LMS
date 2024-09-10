@extends('frontend-1.layout.app')
@section('content')
    <style>
        .input-group-2 {
            display: flex;
            align-items: center;
        }

        .input-2 {
            min-height: 50px;
            max-width: 150px;
            padding: 0 1rem;
            color: #5e4dcd;
            font-size: 20px;
            font-weight: bold;
            border: 1px solid #5e4dcd;
            border-radius: 0 6px 6px 0;
            background-color: transparent;
        }

        .button--submit-2 {
            min-height: 50px;
            padding: .5em 1em;
            border: none;
            border-radius: 6px 0 0 6px;
            background-color: #5e4dcd;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: background-color .3s ease-in-out;
        }

        .button--submit-2:hover {
            background-color: #5e5dcd;
        }

        .input-2:focus, .input-2:focus-visible {
            border-color: #3898EC;
            outline: none;
        }

        .div-design-1 {
            margin: 0 !important;
            background-color: #575757;
            color: white;
        }

    </style>
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12">
                        <section class="pt-0">
                            <div class="container">
                                <div class="card border">
                                    <div class="card-header border-bottom">
                                        <!-- Card START -->
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                    <img src="{{ asset($examEnrollment->exam->curriculum->course->image) }}" class="rounded-2"
                                                         alt="Card image" style="height: 170px !important; width: auto !important;">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="card-body">
                                                        <!-- Title -->
                                                        <h3 class="card-title">
                                                <span style="float: left;">
                                                    {{ $examEnrollment->exam->name }}
                                                </span>
                                                            @if($examEnrollment->studentExamAnswerSheetsTotalMark() >= $examEnrollment->exam->pass_mark)
                                                                <span style="float: right; height: 50px; width: 50px; background-color: #58aaff; color: #ffffff; border-radius: 50%; display: flex; justify-content: center; align-items: center; padding-top: 4px;">
                                                    {{ $examEnrollment->studentExamAnswerSheetsTotalMark() }}
                                                </span>
                                                            @else
                                                                <span style="float: right; height: 50px; width: 50px; background-color: #ff0000; color: #ffffff; border-radius: 50%; display: flex; justify-content: center; align-items: center; padding-top: 4px;">
                                                    {{ $examEnrollment->studentExamAnswerSheetsTotalMark() }}
                                                </span>
                                                            @endif
                                                            <div style="clear: both;"></div>
                                                        </h3>

                                                        <!-- Info -->
                                                        <ul class="list-inline mb-2">
                                                            <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                                                    class="fa fa-medal text-success me-2"></i>{{ $examEnrollment->exam->pass_mark }}
                                                            </li>
                                                            <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i
                                                                    class="fas fa-table text-orange me-2"></i>{{ $examEnrollment->created_at }}
                                                            </li>
                                                            <li class="list-inline-item h6 fw-light"><i
                                                                    class="fas fa-signal text-info me-2"></i>{{ $examEnrollment->exam->curriculum->course->courseLevel->name }}
                                                            </li>
                                                        </ul>

                                                        <!-- button -->
                                                        <a href="#" class="btn btn-primary-soft btn-sm mb-2"><i
                                                                class="fa fa-user"></i> {{ $examEnrollment->user->name }}</a>
                                                        <a href="#" class="btn btn-primary-soft btn-sm mb-2">You {{ $examEnrollment->studentExamAnswerSheetsTotalMark() >= $examEnrollment->exam->pass_mark ? 'Passed' : 'Failed' }} the exam. You get {{ $examEnrollment->studentExamAnswerSheetsTotalMark() }} out of {{ $examEnrollment->exam->questionsTotalMark() }}.</a>
                                                        <!-- Progress bar -->
                                                        <div class="overflow-hidden">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-1 h6">{{ sizeof($examAnswerSheets) }}
                                                                    /{{ sizeof($examEnrollment->exam->questions) }} Completed</p>
                                                                <h6 class="mb-1 text-end">{{ intval( (sizeof($examAnswerSheets) / sizeof($examEnrollment->exam->questions)) * 100 ) }}
                                                                    %</h6>
                                                            </div>
                                                            <div class="progress progress-sm bg-primary bg-opacity-10">
                                                                <div class="progress-bar bg-primary aos aos-init aos-animate"
                                                                     role="progressbar" data-aos="slide-right" data-aos-delay="200"
                                                                     data-aos-duration="1000" data-aos-easing="ease-in-out"
                                                                     style="width: {{ (sizeof($examAnswerSheets) / sizeof($examEnrollment->exam->questions)) * 100 }}%"
                                                                     aria-valuenow="{{ (sizeof($examAnswerSheets) / sizeof($examEnrollment->exam->questions)) * 100 }}"
                                                                     aria-valuemin="0" aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card END -->
                                    </div>

                                    <div class="card-body">

                                        <!-- Title -->
                                        <h5>Answer Sheets of {{ $examEnrollment->user->name }}</h5>
                                        <!-- Accordion START -->
                                        <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                            @foreach($examAnswerSheets as $index => $examAnswerSheet)
                                                <div class="accordion-item mb-3" style="background: #fcfcfc">
                                                    <h6 class="accordion-header font-base" id="heading-{{ $index }}">
                                                        <a class="accordion-button fw-bold collapsed rounded d-block pe-4"
                                                           href="#collapse-{{ $index }}" data-bs-toggle="collapse"
                                                           data-bs-target="#collapse-{{ $index }}" aria-expanded="false"
                                                           aria-controls="collapse-{{ $index }}">
                                                            <span class="mb-0">{{ $examAnswerSheet->question->title }}</span>
                                                            <input type="hidden" name="student_exam_answer_sheet_id[]" value="{{ $examAnswerSheet->id }}">
                                                            ({{ $examAnswerSheet->question->mark }})
                                                            <span class="small d-block mt-1">({{ $examAnswerSheet->question->type }})</span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapse-{{ $index }}" class="accordion-collapse collapse"
                                                         aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample2">
                                                        <!-- Accordion body START -->
                                                        <div class="accordion-body mt-3">
                                                            <div class="vstack gap-3">
                                                                <!-- Course lecture -->
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            @if($examAnswerSheet->question->type == 'selection' || $examAnswerSheet->question->type == 'multiple-choice')
                                                                                <span
                                                                                    class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px border rounded-3">
                                                                    <div class="text-center div-design-1">Options</div>
                                                                    <br>

                                                                        <ol>
                                            @foreach(json_decode($examAnswerSheet->question->option) as $index => $value)
                                                                                @if($value)
                                                                                    <li>{{ $value }}</li>
                                                                                @endif
                                                                            @endforeach
                                        </ol>

                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="position-relative d-flex align-items-center">
                                                                <span
                                                                    class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px border rounded-3 mt-1">
                                                                    <div class="text-center div-design-1">Answer</div>
                                                                    <br>
                                    @if($examAnswerSheet->question->type == 'multiple-choice')
                                                                        @php
                                                                            $examAnswerSheetArray = explode(',', $examAnswerSheet->answer);
                                                                        @endphp
                                                                        <ul>
                                            @foreach($examAnswerSheetArray as $index => $value)
                                                                                <li>{{ $value }}</li>
                                                                            @endforeach
                                        </ul>
                                                                    @else
                                                                        <ul>
                                            <li>
                                                {{ $examAnswerSheet->answer }}
                                            </li>
                                        </ul>
                                                                    @endif
                                </span>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="mb-0">
                                                                    <span
                                                                        class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px mt-2">
                                                                    <div class="input-group-2">
                                                                        <input class="button--submit-2" value="Mark" type="button">
                                                                        <input type="number" class="input-2" id="mark" name="mark[]" value="{{ $examAnswerSheet->mark }}" autocomplete="off" readonly>
</div>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Accordion body END -->
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Accordion END -->
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

    <div id="loaderContainer" class="loader-container" style="display: none;">
        <div id="loader" class="loader">
            <dotlottie-player src="https://lottie.host/e7693050-bb83-4c96-9a61-7530dbb53653/OiULX09tTZ.json"
                              background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                              autoplay></dotlottie-player>

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
@endsection
