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
                <h2 class="mb-0">Courses</h2>
{{--                <p class="mb-0">Check out most 🔥 courses in the market</p>--}}
            </div>
        </div>

        <div class="row g-4" id="course-container">
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
                                    @auth
                                    @if(enrollmentStatus($course->id, auth()->user()->id) === true)
                                        <a href="{{ route('course.show', $course->id) }}" class="badge bg-success bg-opacity-10 text-success me-2 mb-0"><i class="fas fa-globe small fw-bold"></i> Open </a>
                                    @elseif(enrollmentStatus($course->id, auth()->user()->id) === false)
                                        <a href="/course-enrollment-apply/{{ $course->id }}" class="badge bg-success bg-opacity-10 text-success me-2 mb-0"><i class="fas fa-globe small fw-bold"></i> Enroll Now </a>
                                    @else
                                        <a class="badge bg-success bg-opacity-10 text-success me-2 mb-0"><i class="fas fa-globe small fw-bold"></i> Request Pending </a>
                                    @endif
                                    @endauth
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
            <button id="load-more-btn" class="btn btn-primary-soft mb-0">Load more<i class="fas fa-sync ms-2"></i></button>
        </div>
    </div>
</section>
<!-- =======================
Trending courses END -->

<script>
    let skip = 6; // Initial number of courses shown

    document.getElementById('load-more-btn').addEventListener('click', function() {
        loadMoreCourses();
    });

    function loadMoreCourses() {
        const courses = @json($data['courses']);
        const courseContainer = document.getElementById('course-container');
        if (!Array.isArray(courses) || skip >= courses.length) {
            document.getElementById('load-more-btn').style.display = 'none';
            return;
        }
        for (let i = skip; i < skip + 6 && i < courses.length; i++) {
            const course = courses[i];
            const courseHtml = `
                <div class="col-md-6 col-xl-4">
                    <div class="card p-2 shadow h-100">

            <img src="{{ asset($course->image ?? '') }}" class="card-img-top" alt="course image">
            <div class="card-body">
            <h5 class="card-title"><a href="/course-enrollment-details/${course.id}">${course.title}</a></h5>
            <div class="d-flex justify-content-between align-items-center mb-0">
            <a href="#" class="badge bg-info bg-opacity-10 text-info me-2"><i class="fas fa-circle small fw-bold"></i> ${course.course_category.name} </a>
            </div>
            </div>
            </div>
            </div>
            `;
            courseContainer.innerHTML += courseHtml;
        }
        skip += 6;
        if (skip >= courses.length) {
            document.getElementById('load-more-btn').style.display = 'none';
        }
    }
</script>
