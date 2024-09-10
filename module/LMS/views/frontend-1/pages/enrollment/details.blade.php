@extends('frontend-1.layout.app')
@section('content')

        <!-- =======================
        Page intro START -->
        <section class="bg-light py-0 py-sm-5">
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-8">
                        <!-- Badge -->
                        <h6 class="mb-3 font-base bg-primary text-white py-2 px-4 rounded-2 d-inline-block">{{ $course->courseCategory->name }}</h6>
                        <!-- Title -->
                        <h1>{{ $course->title }}</h1>
                        <p>{{ $course->short_description }}</p>
                        <!-- Content -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>0.0/5.0</li>
                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>{{ totalUsersOfSpecificCourseEnrolled($course->id) }} Enrolled</li>
                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-signal text-success me-2"></i>{{ $course->courseLevel->name }}</li>
                            <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="bi bi-patch-exclamation-fill text-danger me-2"></i>Last updated {{ \Carbon\Carbon::parse($course->updated_at)->format('d M Y') }}</li>
                            <li class="list-inline-item h6 mb-0"><i class="fas fa-globe text-info me-2"></i>{{ $course->language }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page intro END -->

        <!-- =======================
        Page content START -->
        <section class="pb-0 py-lg-5">
            <div class="container">
                <div class="row">
                    <!-- Main content START -->
                    <div class="col-lg-8">
                        <div class="card shadow rounded-2 p-0">
                            <!-- Tabs START -->
                            <div class="card-header border-bottom px-4 py-3">
                                <ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">
                                    <!-- Tab item -->
                                    <li class="nav-item me-2 me-sm-4" role="presentation">
                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="false" tabindex="-1">Overview</button>
                                    </li>
                                    <!-- Tab item -->
                                    <li class="nav-item me-2 me-sm-4" role="presentation">
                                        <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-2" type="button" role="tab" aria-controls="course-pills-2" aria-selected="true">Curriculum</button>
                                    </li>
                                    <!-- Tab item -->
                                    <li class="nav-item me-2 me-sm-4" role="presentation">
{{--                                        <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-3" type="button" role="tab" aria-controls="course-pills-3" aria-selected="false" tabindex="-1">Instructor</button>--}}
                                    </li>
                                </ul>
                            </div>
                            <!-- Tabs END -->

                            <!-- Tab contents START -->
                            <div class="card-body p-4">
                                <div class="tab-content pt-2" id="course-pills-tabContent">
                                    <!-- Content START -->
                                    <div class="tab-pane fade" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                        <!-- Course detail START -->
                                        <h5 class="mb-3">Course Description</h5>
                                        <p>{!! $course->description !!}</p>

                                    </div>
                                    <!-- Content END -->

                                    <!-- Content START -->
                                    <div class="tab-pane fade active show" id="course-pills-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                                        <!-- Course accordion START -->
                                        <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                            @foreach(\Module\LMS\Models\CourseCurriculumModel::where('course_id', $course->id)->get() as $index => $curriculum)
                                                <div class="accordion-item mb-3">
                                                    <h6 class="accordion-header font-base" id="heading-{{ $index }}">
                                                        <button class="accordion-button fw-bold rounded d-sm-flex d-inline-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}">
                                                            {{ $curriculum->name }}
                                                            <span class="small ms-0 ms-sm-2">({{ sizeof(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->get()) }})</span>
                                                        </button>
                                                    </h6>
                                                    <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample2" style="">
                                                        <div class="accordion-body mt-3">
                                                            @foreach(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->get() as $topic)
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="position-relative d-flex align-items-center">
                                                                        <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                                            <i class="fas fa-play me-0"></i>
                                                                        </a>
                                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">{{ $topic->name }}</span>
                                                                    </div>
                                                                    {{-- <p class="mb-0">2m 10s</p> --}}
                                                                </div>
                                                                <hr>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Course accordion END -->
                                    </div>
                                    <!-- Content END -->

                                    <!-- Content START -->
                                    <div class="tab-pane fade" id="course-pills-3" role="tabpanel" aria-labelledby="course-pills-tab-3">
                                        <!-- Card START -->
                                        <div class="card mb-0 mb-md-4">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-md-5">
                                                    <!-- Image -->
                                                    <img src="assets/images/instructor/01.jpg" class="img-fluid rounded-3" alt="instructor-image">
                                                </div>
                                                <div class="col-md-7">
                                                    <!-- Card body -->
                                                    <div class="card-body">
                                                        <!-- Title -->
                                                        <h3 class="card-title mb-0">Louis Ferguson</h3>
                                                        <p class="mb-2">Instructor of Marketing</p>
                                                        <!-- Social button -->
                                                        <ul class="list-inline mb-3">
                                                            <li class="list-inline-item me-3">
                                                                <a href="#" class="fs-5 text-twitter"><i class="fab fa-twitter-square"></i></a>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <a href="#" class="fs-5 text-instagram"><i class="fab fa-instagram-square"></i></a>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <a href="#" class="fs-5 text-facebook"><i class="fab fa-facebook-square"></i></a>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <a href="#" class="fs-5 text-linkedin"><i class="fab fa-linkedin"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#" class="fs-5 text-youtube"><i class="fab fa-youtube-square"></i></a>
                                                            </li>
                                                        </ul>

                                                        <!-- Info -->
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <div class="d-flex align-items-center me-3 mb-2">
                                                                    <span class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></span>
                                                                    <span class="h6 fw-light mb-0 ms-2">9.1k</span>
                                                                </div>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <div class="d-flex align-items-center me-3 mb-2">
                                                                    <span class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></span>
                                                                    <span class="h6 fw-light mb-0 ms-2">4.5</span>
                                                                </div>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <div class="d-flex align-items-center me-3 mb-2">
                                                                    <span class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle"><i class="fas fa-play"></i></span>
                                                                    <span class="h6 fw-light mb-0 ms-2">29 Courses</span>
                                                                </div>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <div class="d-flex align-items-center me-3 mb-2">
                                                                    <span class="icon-md bg-info bg-opacity-10 text-info rounded-circle"><i class="fas fa-comment-dots"></i></span>
                                                                    <span class="h6 fw-light mb-0 ms-2">205</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card END -->

                                        <!-- Instructor info -->
                                        <h5 class="mb-3">About Instructor</h5>
                                        <p class="mb-3">Fulfilled direction use continual set him propriety continued. Saw met applauded favorite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashboard see frankness objection abilities. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed of add screened rendered six say his striking confined. </p>
                                        <p class="mb-3">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted.</p>
                                        <!-- Email address -->
                                        <div class="col-12">
                                            <ul class="list-group list-group-borderless mb-0">
                                                <li class="list-group-item pb-0">Mail ID:<a href="#" class="ms-2">hello@email.com</a></li>
                                                <li class="list-group-item pb-0">Web:<a href="#" class="ms-2">https://eduport.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Content END -->

                                </div>
                            </div>
                            <!-- Tab contents END -->
                        </div>
                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->
                    <div class="col-lg-4 pt-5 pt-lg-0">
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-md-6 col-lg-12">
                                <!-- Video START -->
                                <div class="card shadow p-2 mb-4 z-index-9">
                                    <div class="overflow-hidden rounded-3">
                                        <img src="{{ asset($course->image) }}" class="card-img" alt="course image">
                                        <!-- Overlay -->
                                        <div class="bg-overlay bg-dark opacity-6"></div>
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Video button and link -->
                                            <div class="m-auto">
                                                <a href="{{ asset($course->video) }}" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox="" data-gallery="course-video">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body px-3">
                                        <!-- Info -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Price and time -->
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <h3 class="fw-bold mb-0 me-2">${{ $course->price }}</h3>
{{--                                                    <span class="text-decoration-line-through mb-0 me-2">$350</span>--}}
{{--                                                    <span class="badge text-bg-orange mb-0">60% off</span>--}}
                                                </div>
{{--                                                <p class="mb-0 text-danger"><i class="fas fa-stopwatch me-2"></i>5 days left at this price</p>--}}
                                            </div>

                                            <!-- Share button with dropdown -->
                                            <div class="dropdown">
                                                <!-- Share button -->
                                                <a href="#" class="btn btn-sm btn-light rounded small" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-fw fa-share-alt"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
                                                    <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="mt-3 d-sm-flex justify-content-sm-between">
                                            <a href="#" class="btn btn-outline-primary mb-0" style="visibility: hidden;">Free trial</a>
                                            @if(enrollmentStatus($course->id, auth()->user()->id) === true)
                                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-success mb-0">View Course</a>
                                            @elseif(enrollmentStatus($course->id, auth()->user()->id) === false)
                                                <a href="/course-enrollment-apply/{{ $course->id }}" class="btn btn-success mb-0">Enroll Now</a>
                                            @else
                                                <a class="btn btn-success mb-0">Request Pending</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Video END -->

                                <!-- Course info START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">This course includes</h4>
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lessons</span>
                                            <span>{{ $course->total_lessons }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
                                            <span>{{ $course->duration }}h</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
                                            <span>{{ $course->courseLevel->name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>Language</span>
                                            <span>{{ $course->language }}</span>
                                        </li>
{{--                                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-user-clock text-primary"></i>Deadline</span>--}}
{{--                                            <span>Nov 30 2021</span>--}}
{{--                                        </li>--}}
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Certificate</span>
                                            <span>Yes</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Course info END -->
                            </div>

{{--                            <div class="col-md-6 col-lg-12">--}}
{{--                                <!-- Recently Viewed START -->--}}
{{--                                <div class="card card-body shadow p-4 mb-4">--}}
{{--                                    <!-- Title -->--}}
{{--                                    <h4 class="mb-3">Recently Viewed</h4>--}}
{{--                                    <!-- Course item START -->--}}
{{--                                    <div class="row gx-3 mb-3">--}}
{{--                                        <!-- Image -->--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="rounded" src="assets/images/courses/4by3/21.jpg" alt="">--}}
{{--                                        </div>--}}
{{--                                        <!-- Info -->--}}
{{--                                        <div class="col-8">--}}
{{--                                            <h6 class="mb-0"><a href="#">Fundamentals of Business Analysis</a></h6>--}}
{{--                                            <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">--}}
{{--                                                <li class="list-group-item px-0 d-flex justify-content-between">--}}
{{--                                                    <span class="text-success">$130</span>--}}
{{--                                                    <span class="h6 fw-light">4.5<i class="fas fa-star text-warning ms-1"></i></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- Course item END -->--}}

{{--                                    <!-- Course item START -->--}}
{{--                                    <div class="row gx-3">--}}
{{--                                        <!-- Image -->--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="rounded" src="assets/images/courses/4by3/18.jpg" alt="">--}}
{{--                                        </div>--}}
{{--                                        <!-- Info -->--}}
{{--                                        <div class="col-8">--}}
{{--                                            <h6 class="mb-0"><a href="#">The Complete Video Production Bootcamp</a></h6>--}}
{{--                                            <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">--}}
{{--                                                <li class="list-group-item px-0 d-flex justify-content-between">--}}
{{--                                                    <span class="text-success">$150</span>--}}
{{--                                                    <span class="h6 fw-light">4.0<i class="fas fa-star text-warning ms-1"></i></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- Course item END -->--}}
{{--                                </div>--}}
{{--                                <!-- Recently Viewed END -->--}}

{{--                                <!-- Tags START -->--}}
{{--                                <div class="card card-body shadow p-4">--}}
{{--                                    <h4 class="mb-3">Popular Tags</h4>--}}
{{--                                    <ul class="list-inline mb-0">--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">blog</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">business</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">theme</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">bootstrap</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">data science</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">web development</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">tips</a> </li>--}}
{{--                                        <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">machine learning</a> </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <!-- Tags END -->--}}
{{--                            </div>--}}
                        </div><!-- Row End -->
                    </div>
                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

        <!-- =======================
        Listed courses START -->
{{--        <section class="pt-0">--}}
{{--            <div class="container">--}}
{{--                <!-- Title -->--}}
{{--                <div class="row mb-4">--}}
{{--                    <h2 class="mb-0">Top Listed Courses</h2>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <!-- Slider START -->--}}
{{--                    <div class="tiny-slider arrow-round arrow-blur arrow-hover">--}}
{{--                        <div class="tns-outer" id="tns1-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">7 to 10</span>  of 4</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div class="tiny-slider-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-autoplay="false" data-arrow="true" data-edge="2" data-dots="false" data-items="3" data-items-lg="2" data-items-sm="1" id="tns1" style="transition-duration: 0s; transform: translate3d(-38.8889%, 0px, 0px);"><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/18.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Fundamentals of Business Analysis</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Business Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$160</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/21.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">6k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Google Ads Training: Become a PPC Expert</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i> SEO</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$226</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/20.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">15k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Behavior, Psychology and Care Training</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Lifestyle</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$342</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/17.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">9.1k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.5</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Personal Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$140</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/18.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Fundamentals of Business Analysis</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Business Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$160</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/21.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">6k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Google Ads Training: Become a PPC Expert</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i> SEO</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$226</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned tns-slide-active">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/20.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">15k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Behavior, Psychology and Care Training</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Lifestyle</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$342</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <!-- Card Item START -->--}}
{{--                                        <div class="pb-4 tns-item tns-slide-active" id="tns1-item0">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/17.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">9.1k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.5</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Personal Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$140</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- Card Item END -->--}}

{{--                                        <!-- Card Item START -->--}}
{{--                                        <div class="pb-4 tns-item tns-slide-active" id="tns1-item1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/18.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Fundamentals of Business Analysis</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Business Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$160</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- Card Item END -->--}}

{{--                                        <!-- Card Item START -->--}}
{{--                                        <div class="pb-4 tns-item tns-slide-active" id="tns1-item2">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/21.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">6k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Google Ads Training: Become a PPC Expert</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i> SEO</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$226</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- Card Item END -->--}}

{{--                                        <!-- Card Item START -->--}}
{{--                                        <div class="pb-4 tns-item" id="tns1-item3" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/20.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">15k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Behavior, Psychology and Care Training</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Lifestyle</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$342</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- Card Item END -->--}}
{{--                                        <div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/17.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">9.1k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.5</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Personal Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$140</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/18.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Fundamentals of Business Analysis</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Business Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$160</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/21.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">6k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Google Ads Training: Become a PPC Expert</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i> SEO</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$226</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/20.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">15k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Behavior, Psychology and Care Training</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Lifestyle</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$342</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/17.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">9.1k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">4.5</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Personal Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$140</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/18.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">2.5k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.6</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Fundamentals of Business Analysis</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i>Business Development</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$160</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><div class="pb-4 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">--}}
{{--                                            <div class="card p-2 border">--}}
{{--                                                <div class="rounded-top overflow-hidden">--}}
{{--                                                    <div class="card-overlay-hover">--}}
{{--                                                        <img src="assets/images/courses/4by3/21.jpg" class="card-img-top" alt="course image">--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Hover element -->--}}
{{--                                                    <div class="card-img-overlay">--}}
{{--                                                        <div class="card-element-hover d-flex justify-content-end">--}}
{{--                                                            <a href="#" class="icon-md bg-white rounded-circle text-center">--}}
{{--                                                                <i class="fas fa-shopping-cart text-danger"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <!-- Badge and icon -->--}}
{{--                                                    <div class="d-flex justify-content-between">--}}
{{--                                                        <!-- Rating and info -->--}}
{{--                                                        <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                            <!-- Info -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">6k</span>--}}
{{--                                                            </li>--}}
{{--                                                            <!-- Rating -->--}}
{{--                                                            <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                                                <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                                                <span class="h6 fw-light ms-2 mb-0">3.8</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!-- Avatar -->--}}
{{--                                                        <div class="avatar avatar-sm">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Divider -->--}}
{{--                                                    <hr>--}}
{{--                                                    <!-- Title -->--}}
{{--                                                    <h5 class="card-title"><a href="#">Google Ads Training: Become a PPC Expert</a></h5>--}}
{{--                                                    <!-- Badge and Price -->--}}
{{--                                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                        <a href="#" class="badge bg-info bg-opacity-10 text-info"><i class="fas fa-circle small fw-bold me-2"></i> SEO</a>--}}
{{--                                                        <!-- Price -->--}}
{{--                                                        <h3 class="text-success mb-0">$226</h3>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div></div></div></div><div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i class="fas fa-chevron-left"></i></button><button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i class="fas fa-chevron-right"></i></button></div></div>--}}
{{--                    </div>--}}
{{--                    <!-- Slider END -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- =======================
        Listed courses END -->
@endsection
