<style>
    .icon-gradient {
        background-image: linear-gradient(to top, rgb(200, 90, 255), #586eff); /* Gradient from bottom to top */
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
</style>
<!-- =======================
    Trending courses START -->
<section class="pt-0 pt-md-5">
    <div class="container">
        <!-- Title -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h2 class="mb-0">Our <span class="text-warning">Trending</span> Courses</h2>
{{--                <p class="mb-0">Check out most 🔥 courses in the market</p>--}}
            </div>
        </div>

        <div class="row g-4">
            <!-- Card Item START -->
            @if(isset($courses))
                @foreach($courses->take(6) as $course)
                    <div class="col-md-6 col-xl-4">
                        <div class="card p-2 shadow h-100">
                            <div class="rounded-top overflow-hidden">
                                <div class="card-overlay-hover">
                                    <!-- Image -->
                                    <img src="{{ asset($course->image) }}" class="card-img-top" alt="course image" style="max-width: 472px !important; max-height: 200px !important;">
                                </div>
                                <!-- Hover element -->
                                <div class="card-img-overlay">
                                    <div class="card-element-hover d-flex justify-content-end">
                                        <a href="/course-enrollment-details/{{ $course->id }}" class="bg-white rounded text-center">
                                            &nbsp;<i class="fas fa-book-reader icon-gradient"></i> <span style="color: #586eff;">Overview</span>&nbsp;
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Rating and avatar -->
                                <div class="d-flex justify-content-between">
                                    <!-- Rating and info -->
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <!-- Info -->
                                        <li class="list-inline-item d-flex justify-content-center align-items-center">
                                            <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle"><i class="fas fa-user-graduate"></i></div>
                                            <span class="h6 fw-light mb-0 ms-2">{{ totalUsersOfSpecificCourseEnrolled($course->id) }}</span>
                                        </li>
                                        <!-- Rating -->
{{--                                        <li class="list-inline-item d-flex justify-content-center align-items-center">--}}
{{--                                            <div class="icon-md bg-warning bg-opacity-15 text-warning rounded-circle"><i class="fas fa-star"></i></div>--}}
{{--                                            <span class="h6 fw-light mb-0 ms-2">4.5</span>--}}
{{--                                        </li>--}}
                                        <!-- Is enrolled -->
                                        @if(\Illuminate\Support\Facades\Auth::check() && enrollmentStatus($course->id, auth()->user()->id))
                                        <li class="list-inline-item d-flex justify-content-center align-items-center">
                                            <div class="icon-md bg-success bg-opacity-15 text-success rounded-circle"><i class="fas fa-check-circle"></i></div>
                                            <span class="h6 fw-light mb-0 ms-2">Enrolled</span>
                                        </li>
                                        @endif
                                    </ul>
                                    <!-- Avatar -->
                                    <div class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" src="{{ asset($course->image) }}" alt="avatar">
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr>
                                <!-- Title -->
                                <h5 class="card-title"><a href="/course-enrollment-details/{{ $course->id }}">{{ $course->title }}</a></h5>
                                <!-- Badge and Price -->
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <a href="#" class="badge bg-info bg-opacity-10 text-info me-2"><i class="fas fa-circle small fw-bold"></i> {{ $course->courseCategory->name }} </a>
                                    <!-- Price -->
{{--                                    <h3 class="text-success mb-0">${{ $course->price }}</h3>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Card Item END -->
        </div>
        <!-- Button -->
        <div class="text-center mt-5">
            <a href="/course-frontend" class="btn btn-primary-soft mb-0">View more<i class="fas fa-sync ms-2"></i></a>
        </div>
    </div>
</section>
<!-- =======================
Trending courses END -->
