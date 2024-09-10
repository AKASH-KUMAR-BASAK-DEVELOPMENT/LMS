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
                                    <h1 class="text-white">Make Course Assignment</h1>
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
                                            <form action="{{ route('student-assessment.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label class="form-label">Assignment: {{ $assessment->title }}</label> &nbsp;&nbsp;&nbsp;
                                                    <label class="form-label bg-info text-white p-2 rounded">Mark:
                                                        @if(isset($student_assessment->link) && file_exists($student_assessment->link))
                                                            {{ $student_assessment->mark ?? 'Teacher is not marking you assignment yet!' }}
                                                        @else
                                                            'Please submit your assignment for get mark!'
                                                        @endif
                                                    </label>
                                                    <input class="hidden" type="text" name="assessment_id" value="{{ $assessment->id }}" hidden>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <input class="form-control" type="text" name="title" value="{{ optional($student_assessment)->title }}" placeholder="Ex. Electronics Practical 1">
                                                </div>
                                                <br>
                                                @if(isset($student_assessment->link) && file_exists($student_assessment->link))
                                                    <div class="col-12">
                                                        <label class="form-label">A Assessment File Found</label>
                                                        <a href="{{ asset($student_assessment->link) }}">Click to Open</a>
                                                    </div>
                                                @endif
                                                <br>
                                                <div class="col-12">
                                                    <label class="form-label">Assignment File Upload</label>
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
                </div>
            </div>
        </div>
    </section>
@endsection
