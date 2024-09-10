@extends('frontend-1.layout.app')
@section('content')

{{--    @include('frontend-1.partials.dashboard-header')--}}
    <section class="pt-0">
        <div class="container">
            <div class="row">
{{--                @include('frontend-1.partials.dashboard-sidebar')--}}
                <div class="col-xl-12">
                    <!-- =======================
        Page Banner START -->
                    <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded" style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
                        <!-- Main banner background image -->
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <!-- Title -->
                                    <h1 class="text-white">{{ $assessment->curriculum->course->title }}: Assessment</h1>
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
                                    <!-- Card body START -->
                                    <div class="card-body">
                                        <!-- Step content START -->
                                        <div class="bs-stepper-content">
                                                <div class="col-12">
                                                    <label class="form-label">Course: {{ $assessment->curriculum->course->title }} , Curriculum: {{ $assessment->curriculum->name }}</label>
                                                    <input type="hidden" name="assessment_id" value="{{ $assessment }}">
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <h6>{{ $assessment->title }}</h6>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <h6>{{ $assessment->description }}</h6>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Allow submission from</label>
                                                        @php
                                                            list($date, $time) = explode(' ', $assessment->allow_submission_form);
                                                        @endphp
                                                        <h6><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }} &nbsp;&nbsp;&nbsp; <i class="fa fa-clock text-primary"></i> {{ \Carbon\Carbon::parse($time)->format('g:i A') }}</h6>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Due date</label>
                                                        @php
                                                            list($date, $time) = explode(' ', $assessment->due_date);
                                                        @endphp
                                                        <h6><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }} &nbsp;&nbsp;&nbsp; <i class="fa fa-clock text-primary"></i> {{ \Carbon\Carbon::parse($time)->format('g:i A') }}</h6>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Cut-off date</label>
                                                        @php
                                                            list($date, $time) = explode(' ', $assessment->cut_off_date);
                                                        @endphp
                                                        <h6><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }} &nbsp;&nbsp;&nbsp; <i class="fa fa-clock text-primary"></i> {{ \Carbon\Carbon::parse($time)->format('g:i A') }}</h6>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Remind me to grade by</label>
                                                        @php
                                                        if (isset($assessment->remind_grade_buy)){
    list($date, $time) = explode(' ', $assessment->remind_grade_buy);
}

                                                        @endphp
                                                        <h6><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }} &nbsp;&nbsp;&nbsp; <i class="fa fa-clock text-primary"></i> {{ \Carbon\Carbon::parse($time)->format('g:i A') }}</h6>
                                                    </div>
                                                </div>
                                                <br>
                                                @if(isset($assessment->link) && file_exists(optional($assessment)->link))
                                                    <div class="col-12">
                                                        <label class="form-label">A Assessment File Found</label>
                                                        <a href="{{ asset(optional($assessment)->link) }}">Click to Open</a>
                                                    </div>
                                                @else
                                                    <div class="col-12">
                                                        <label class="form-label">No Assessment File Found</label>
                                                    </div>
                                                @endif

                                            @if(\Illuminate\Support\Facades\Auth::check() && in_array(auth()->user()->role_id, [1, 2, 3, 6]))
                                                <div class="d-flex justify-content-end mt-3">
                                                    <a href="{{ route('student-assessment.index', $assessment->id) }}" class="btn btn-primary next-btn mb-0">Student Submission</a> &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('course-assessment.edit', $assessment->id) }}" class="btn btn-primary next-btn mb-0">Edit</a>
                                                </div>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::check() && in_array(auth()->user()->role_id, [4]))
                                                <div class="d-flex justify-content-end mt-3">
                                                    <a href="{{ route('student-assessment.edit', $assessment->id) }}" class="btn btn-primary next-btn mb-0">Add Submission</a>
                                                </div>
                                            @endif
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

    <script>
        document.querySelectorAll('input[type="datetime-local"]').forEach(function(input) {
            input.addEventListener('click', function() {
                this.showPicker();
            });
        });
    </script>
@endsection
