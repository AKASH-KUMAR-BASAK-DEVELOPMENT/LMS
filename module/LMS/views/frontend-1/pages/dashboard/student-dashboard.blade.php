@extends('frontend-1.layout.app')
@section('content')
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12 p-2">

                        <!-- Counter boxes START -->
                        <div class="row mb-4">
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-orange bg-opacity-15 rounded-3">
                                    <span class="display-6 lh-1 text-orange mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="9" data-purecounter-delay="200" data-purecounter-duration="0">9</h5>
                                        </div>
                                        <p class="mb-0 h6 fw-light">Total Enrolled Courses</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-15 rounded-3">
                                    <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-clipboard-check fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="52" data-purecounter-delay="200" data-purecounter-duration="0">52</h5>
                                        </div>
                                        <p class="mb-0 h6 fw-light">Complete lessons</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-10 rounded-3">
                                    <span class="display-6 lh-1 text-success mb-0"><i class="fas fa-medal fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="8" data-purecounter-delay="300" data-purecounter-duration="0">8</h5>
                                        </div>
                                        <p class="mb-0 h6 fw-light">Achieved Certificates</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter boxes END -->
                        <!-- Main content END -->
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
