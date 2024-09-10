@extends('frontend.layout.app3')
@section('content')
<style>
    .icon-lg-orange-soft {
        width: 3.5rem;
        height: 3.5rem;
        line-height: 3.5rem;
        text-align: center;
        font-size: 1.2rem;
        background-color: #ffead6;
    }
    .icon-lg-info-soft {
        width: 3.5rem;
        height: 3.5rem;
        line-height: 3.5rem;
        text-align: center;
        font-size: 1.2rem;
        background-color: #dff5ff;
    }
    .icon-lg-success-soft {
        width: 3.5rem;
        height: 3.5rem;
        line-height: 3.5rem;
        text-align: center;
        font-size: 1.2rem;
        background-color: #d8ffeb;
    }
    .icon-lg-purple-soft {
        width: 3.5rem;
        height: 3.5rem;
        line-height: 3.5rem;
        text-align: center;
        font-size: 1.2rem;
        background-color: #eee6ff;
    }
</style>


    <div class="main-wrapper">

        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            Home/Feature
                        </nav>
                        <h2 class="breadcrumb-title">Feature</h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <section>
                            <div class="container">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-5">
                                        <!-- Title -->
                                        <h2>Feature of our, <span class="text-warning">E-Learn</span> system.</h2>
                                        <!-- Image -->
                                        <img src="{{ asset('frontend-1/assets/images/about/03.jpg') }}" class="rounded-2" width="250px" alt="">
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row g-4">
                                            <!-- Item -->
                                            <div class="col-sm-6">
                                                <div class="icon-lg-orange-soft text-orange rounded-2"><i class="fas fa-graduation-cap fs-5"></i></div>
                                                <h5 class="mt-2">Student Friendly</h5>
                                                <p class="mb-0">Our E-Learning is very student friendly.Course content is structured by curriculum and topics.Every Course defined for multiple exams and it prepared by teacher.</p>
                                            </div>
                                            <!-- Item -->
                                            <div class="col-sm-6">
                                                <div class="icon-lg-info-soft text-info rounded-2"><i class="fas fa-laptop fs-5"></i></div>
                                                <h5 class="mt-2">Simple Interface</h5>
                                                <p class="mb-0">We dont take your patience for learning. Our systems simple interface give you a comfortable learning and examining experience.   </p>
                                            </div>
                                            <!-- Item -->
                                            <div class="col-sm-6">
                                                <div class="icon-lg-success-soft text-success rounded-2"><i class="fas fa-clock fs-5"></i></div>
                                                <h5 class="mt-2">Real-Time Exam</h5>
                                                <p class="mb-0">Our Exam system is Realtime and fully secured.We detect examinee at exam time and keep all answered data before finish exam so if your device or internet if shutdown before completing full exam that is not hampered your result.</p>
                                            </div>
                                            <!-- Item -->
                                            <div class="col-sm-6">
                                                <div class="icon-lg-purple-soft text-purple rounded-2"><i class="fas fa-book fs-5"></i></div>
                                                <h5 class="mt-2">Support Multiple Resource</h5>
                                                <p class="mb-0">You can upload any kinds of data for learning resource.We support SCORM Packages, Image, Video, PDF File, Text all of this.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
