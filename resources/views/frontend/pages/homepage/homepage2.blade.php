@extends('frontend.layout.app3')
@section('content')
    <div class="main-wrapper main-wrapper-two">

        <section class="home-slide d-flex align-items-center" id="sliderId">
            <div class="banner-two-bg-img">
                <img src="{{ asset('mentoring-frontend/assets/img/bg/banner-two-bg-01.png') }}" class="img-fluid banner-two-bg" alt>
{{--                <img src="{{ asset('mentoring-frontend/assets/img/bg/banner-two-bg-02.png') }}" class="img-fluid banner-two-bgtwo" alt>--}}
                <img src="{{ asset('mentoring-frontend/assets/img/bg/banner-two-bg-03.png') }}" class="img-fluid banner-two-bgthree" alt>
            </div>
            <div class="container">
                <div class="row ">
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="home-slide-face aos" data-aos="fade-up">
                            <div class="home-slide-text">
                                <h1 id="title-banner-custom">{{ banner()->short_description }}</h1>
                                <p>{{ banner()->description }}</p>
                            </div>

                            <div class="search-box search-index-two">
                                <form action="{{ route('search') }}" method="post">
                                    @csrf
                                    <div class="form-group search-info location-search location-search-four">
                                        <input type="text" class="form-control text-truncate key"
                                               name="search" id="search" oninput="liveSearchAutofill(this.value)"
                                               placeholder=" Keyword / Course Name">
                                        <div id="autofill" style="position: absolute; top: 100%; left: 0; width: 100%; z-index: 1000; background: #fff;"></div>

                                        <button type="submit"
                                           class="btn bg-search search-btn align-items-center d-flex justify-content-center">Find
                                            Course</button>
                                    </div>
                                </form>
                            </div>


                            <div class="poular-search">
                                <p><span>Popular Search :</span>
                                @foreach(['recent1', 'recent2', 'recent3', 'recent4'] as $key)
                                    @if(Illuminate\Support\Facades\Cache::has($key))
                                            <a>
                                                {{ Illuminate\Support\Facades\Cache::get($key) }}
                                            </a>
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endif
                                        @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section trending-courses">
            <div class="container">
                <div class="course-two-bg">
                    <img src="{{ asset('mentoring-frontend/assets/img/bg/home-two-bg-04.png') }}" class="img-fluid trend-course-bgone" alt>
                    <img src="{{ asset('mentoring-frontend/assets/img/bg/home-two-bg-06.png') }}" class="img-fluid trend-course-bgtwo" alt>
                </div>
                <div class="section-header section-head-one text-center aos " data-aos="fade-up">
                    <h2>Our Courses</h2>
                    <div class="title-bar">
                        <img src="{{ asset('mentoring-frontend/assets/img/icon/index-title-bar.svg') }}" alt>
                    </div>
                    <p class="sub-title">They are highly qualified and trained in their areas</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="trend-course-tab-slider most-trend-two owl-carousel">
                            @if(isset($courses))
                                @foreach($courses->take(10) as $course)
                            <div class="course-box" data-aos="fade-up">
                                <div class="product">
                                    <div class="product-img trend-course">
                                        <a href="{{ route('course.edit', $course->id) }}">
                                            <img class="img-fluid" alt src="{{ asset($course->image) }}" width="600" height="300">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="rating rate-star">
                                            <span class="average-rating rate-point ">
                                            <i class="fas fa-star"></i>
                                            5.0
                                            </span>
                                            <span><img src="{{ asset('mentoring-frontend/assets/img/icon/user-06.svg') }}" alt>{{ totalUsersOfSpecificCourseEnrolled($course->id) }} Students</span>
                                        </div>
                                        <h3 class="title"><a href="{{ route('course.edit', $course->id) }}">{{ $course->title }}</a></h3>
                                        <p>{{ $course->short_description }} </p>
                                        <div class="rating rating-star rating-two align-items-center">
                                            <div class="rating-img">
                                                <img src="{{ asset($course->createdBy->image ?? 'frontend-1/assets/images/default-image.jpg') }}" alt>
                                            </div>
                                            <h5><a href="javascript:void(0)">{{ $course->createdBy->name }}</a></h5>
                                            <div class="course-btn">
                                                <span>
                                                    @auth
                                                        @if(enrollmentStatus($course->id, auth()->user()->id) === true)
                                                            <a href="{{ route('course.edit', $course->id) }}" class="bg-transparent"> <span class="text-info">Open</span> </a>
                                                        @elseif(enrollmentStatus($course->id, auth()->user()->id) === false)
                                                            <a href="/course-enrollment-apply/{{ $course->id }}"> Enroll Now </a>
                                                        @else
                                                            <a>Request Pending </a>
                                                        @endif
                                                    @endauth
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        {{--document.addEventListener('DOMContentLoaded', function () {--}}
        {{--    const slider = document.getElementById('sliderId');--}}
        {{--    const titleBannerCustom = document.getElementById('title-banner-custom');--}}
        {{--    const images = [];--}}
        {{--    const text = [];--}}
        {{--    @foreach($sliders as $slider)--}}
        {{--        images.push("{{ asset($slider->image) }}");--}}
        {{--    @endforeach--}}

        {{--    @foreach($sliders as $slider)--}}
        {{--        text.push("{{ $slider->title }}");--}}
        {{--    @endforeach--}}

        {{--    let currentIndex = 0;--}}

        {{--    function changeBackgroundImage() {--}}
        {{--        if (window.matchMedia("(min-width: 769px)").matches) {--}}
        {{--            // Desktop view: Change background image and text--}}
        {{--            slider.style.backgroundImage = `url('${images[currentIndex]}')`;--}}
        {{--            titleBannerCustom.textContent = text[currentIndex];--}}
        {{--        } else {--}}
        {{--            // Mobile view: Only change the text, hide the background image--}}
        {{--            slider.style.backgroundImage = 'none'; // Hide background image--}}
        {{--            titleBannerCustom.textContent = text[currentIndex];--}}
        {{--        }--}}
        {{--        currentIndex = (currentIndex + 1) % text.length;--}}
        {{--    }--}}

        {{--    // Run the background image change function at an interval--}}
        {{--    setInterval(changeBackgroundImage, 6000);--}}
        {{--});--}}


        document.addEventListener('DOMContentLoaded', function () {
            const slider = document.getElementById('sliderId');
            const titleBannerCustom = document.getElementById('title-banner-custom');
            const images = [];
            const text = [];
            let currentIndex = 0;

            @foreach($sliders as $slider)
            images.push("{{ asset($slider->image) }}");
            @endforeach

            @foreach($sliders as $slider)
            text.push("{{ $slider->title }}");
            @endforeach

            slider.style.backgroundImage = `url('${images[currentIndex]}')`;
            titleBannerCustom.textContent = text[currentIndex];

            function changeBackgroundImage() {
                slider.style.transition = 'opacity 2s ease';
                slider.style.opacity = 0;
                titleBannerCustom.style.transition = 'opacity 2s ease';
                titleBannerCustom.style.opacity = 0;

                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    if (window.matchMedia("(min-width: 769px)").matches) {
                        slider.style.backgroundImage = `url('${images[currentIndex]}')`;
                    } else {
                        slider.style.backgroundImage = 'none';
                    }
                    titleBannerCustom.textContent = text[currentIndex];
                    slider.style.opacity = 1;
                    titleBannerCustom.style.opacity = 1;
                }, 1000);
            }
            setInterval(changeBackgroundImage, 6000);
        });

    </script>


@endsection
