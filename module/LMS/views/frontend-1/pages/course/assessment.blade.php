@extends('frontend-1.layout.app')
@section('content')

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0" style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
            <!-- Main banner background image -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Title -->
                        <h1 class="text-white">Make Course Assessment</h1>
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
                                    <div class="col-12">
                                        <label class="form-label">Course: {{ $assessment->curriculum->title }}</label>
                                        <input class="hidden" type="text" name="course_id" value="{{ $course->id }}" hidden>
                                    </div>
                                    @if(isset($course->courseAssessments[0]->link) && file_exists(optional($course->courseAssessments[0])->link))
                                    <div class="col-12">
                                        <label class="form-label">A Assessment File Found</label>
                                        <a href="{{ asset(optional($course->courseAssessments[0])->link) }}">Click to Open</a>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <label class="form-label">Assessment File Upload</label>
                                        <input class="form-control" type="file" name="assessment">
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
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
