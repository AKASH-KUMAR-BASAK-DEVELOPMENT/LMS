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
                                    <h1 class="text-white">{{ $curriculum->name }}: Make Assessment</h1>
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
                                            <form action="{{ route('course-assessment.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="curriculum_id" value="{{ $curriculum->id }}">
                                                @if($folder)
                                                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                                                @endif
                                                <input type="hidden" name="course_id" value="{{ $curriculum->course->id }}">
                                                <div class="col-12">
                                                    <label class="form-label">Course: {{ $curriculum->course->title }} , Curriculum: {{ $curriculum->name }}</label>
                                                    <input class="hidden" type="text" name="course_id" value="{{ $curriculum->course->id }}" hidden>
                                                </div>
                                                @if(isset($course->courseAssessments[0]->link) && file_exists(optional($course->courseAssessments[0])->link))
                                                    <div class="col-12">
                                                        <label class="form-label">A Assessment File Found</label>
                                                        <a href="{{ asset(optional($course->courseAssessments[0])->link) }}">Click to Open</a>
                                                    </div>
                                                @endif
                                                <div class="col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <input class="form-control" type="text" name="title" placeholder="Ex. Electronics Practical 1">
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" name="description" placeholder="Ex. Assignment Submission Guide"></textarea>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Allow submission from</label>
                                                        <input class="form-control" type="datetime-local" name="allow_submission_form">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Due date</label>
                                                        <input class="form-control" type="datetime-local" name="due_date">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Cut-off date</label>
                                                        <input class="form-control" type="datetime-local" name="cut_off_date">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Remind me to grade by</label>
                                                        <input class="form-control" type="datetime-local" name="remind_grade_buy">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="form-label">File</label>
                                                    <input class="form-control" type="file" name="assessment">
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-check form-switch form-check-md">
                                                        <input class="form-check-input" type="checkbox" name="is_show_description" value="1" id="is_show">
                                                        <label class="form-check-label" for="is_show">Always show description</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-primary next-btn mb-0">Update</button>
                                                </div>
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

    <script>
        document.querySelectorAll('input[type="datetime-local"]').forEach(function(input) {
            input.addEventListener('click', function() {
                this.showPicker();
            });
        });
    </script>
@endsection
