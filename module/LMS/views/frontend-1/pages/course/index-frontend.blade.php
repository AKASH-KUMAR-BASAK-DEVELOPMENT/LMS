@extends('frontend-1.layout.app3')
@section('content')
    <div class="main-wrapper" style="transform: none;">

        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                                Home/Courses
                        </nav>
                        <h2 class="breadcrumb-title">All Course</h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="content" style="transform: none; min-height: 148px;">
            <div class="container-fluid" style="transform: none;">
                <div class="row" style="transform: none;">
                    <div class="col-lg-12 col-md-12">
                        <div class="row blog-grid-row">
                            @if(isset($courses))
                                @foreach($courses->take(6) as $course)
                                    <div class="col-md-3 col-sm-12">

                                        <div class="blog grid-blog">
                                            <div class="blog-image">
                                                <a href="{{ route('course.edit', $course->id) }}"><img class="img-fluid" src="{{ asset($course->image) }}" alt="Post Image"></a>
                                            </div>
                                            <div class="blog-content">
                                                <ul class="entry-meta meta-item">
                                                    <li>
                                                        <div class="post-author">
                                                            <a href="profile.html"><img src="{{ asset($course->createdBy->image ?? 'frontend-1/assets/images/default-image.jpg') }}" alt="Post Author"> <span>{{ $course->createdBy->name }}</span></a>
                                                        </div>
                                                    </li>
                                                    <li><i class="far fa-user"></i> {{ totalUsersOfSpecificCourseEnrolled($course->id) }}</li>
                                                </ul>
                                                <h3 class="blog-title"><a href="{{ route('course.edit', $course->id) }}">{{ $course->title }}</a></h3>
                                                <p class="mb-0">{{ $course->short_description }}</p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>

{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="blog-pagination">--}}
{{--                                    <nav>--}}
{{--                                        <ul class="pagination justify-content-center">--}}
{{--                                            <li class="page-item disabled">--}}
{{--                                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item">--}}
{{--                                                <a class="page-link" href="#">1</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item active">--}}
{{--                                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item">--}}
{{--                                                <a class="page-link" href="#">3</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item">--}}
{{--                                                <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </nav>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>

{{--                    <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 2239.52px;">--}}

                </div>
            </div>
        </div>

    </div>
@endsection
