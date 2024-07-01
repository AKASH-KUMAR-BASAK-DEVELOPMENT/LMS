@extends('frontend-1.layout.app')
@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light p-4 text-center rounded-3">
                        <h1 class="m-0">Our Trending Courses</h1>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Course</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
{{--            <form class="bg-light border p-4 rounded-3 my-4 z-index-9 position-relative">--}}
{{--                <div class="row g-3">--}}
{{--                    <div class="col-xl-3">--}}
{{--                        <input class="form-control me-1" type="search" placeholder="Enter keyword">--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-8">--}}
{{--                        <div class="row g-3">--}}
{{--                            <div class="col-sm-6 col-md-3 pb-2 pb-md-0">--}}
{{--                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select form-select-sm js-choice choices__input" aria-label=".form-select-sm example" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Categories</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Categories</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Categories" placeholder=""><div class="choices__list" role="listbox"><div id="choices--dxu3-item-choice-3" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="3" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Categories</div><div id="choices--dxu3-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="Accounting" data-select-text="Press to select" data-choice-selectable="">Accounting</div><div id="choices--dxu3-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="All" data-select-text="Press to select" data-choice-selectable="">All</div><div id="choices--dxu3-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Design" data-select-text="Press to select" data-choice-selectable="">Design</div><div id="choices--dxu3-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Development" data-select-text="Press to select" data-choice-selectable="">Development</div><div id="choices--dxu3-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Finance" data-select-text="Press to select" data-choice-selectable="">Finance</div><div id="choices--dxu3-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Legal" data-select-text="Press to select" data-choice-selectable="">Legal</div><div id="choices--dxu3-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="Marketing" data-select-text="Press to select" data-choice-selectable="">Marketing</div><div id="choices--dxu3-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Photography" data-select-text="Press to select" data-choice-selectable="">Photography</div><div id="choices--dxu3-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="Translation" data-select-text="Press to select" data-choice-selectable="">Translation</div><div id="choices--dxu3-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="Writing" data-select-text="Press to select" data-choice-selectable="">Writing</div></div></div></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 col-md-3 pb-2 pb-md-0">--}}
{{--                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select form-select-sm js-choice choices__input" aria-label=".form-select-sm example" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Price level</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Price level</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Price level" placeholder=""><div class="choices__list" role="listbox"><div id="choices--xbpz-item-choice-4" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="4" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Price level</div><div id="choices--xbpz-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="All" data-select-text="Press to select" data-choice-selectable="">All</div><div id="choices--xbpz-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Free" data-select-text="Press to select" data-choice-selectable="">Free</div><div id="choices--xbpz-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Paid" data-select-text="Press to select" data-choice-selectable="">Paid</div></div></div></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 col-md-3 pb-2 pb-md-0">--}}
{{--                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select form-select-sm js-choice choices__input" aria-label=".form-select-sm example" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Skill level</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Skill level</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Skill level" placeholder=""><div class="choices__list" role="listbox"><div id="choices--byaa-item-choice-5" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="5" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Skill level</div><div id="choices--byaa-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="Advanced" data-select-text="Press to select" data-choice-selectable="">Advanced</div><div id="choices--byaa-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="All levels" data-select-text="Press to select" data-choice-selectable="">All levels</div><div id="choices--byaa-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Beginner" data-select-text="Press to select" data-choice-selectable="">Beginner</div><div id="choices--byaa-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Intermediate" data-select-text="Press to select" data-choice-selectable="">Intermediate</div></div></div></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 col-md-3 pb-2 pb-md-0">--}}
{{--                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select form-select-sm js-choice choices__input" aria-label=".form-select-sm example" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Language</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Language</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Language" placeholder=""><div class="choices__list" role="listbox"><div id="choices--d9ga-item-choice-5" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="5" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Language</div><div id="choices--d9ga-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="Bengali" data-select-text="Press to select" data-choice-selectable="">Bengali</div><div id="choices--d9ga-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="English" data-select-text="Press to select" data-choice-selectable="">English</div><div id="choices--d9ga-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Francas" data-select-text="Press to select" data-choice-selectable="">Francas</div><div id="choices--d9ga-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Hindi" data-select-text="Press to select" data-choice-selectable="">Hindi</div><div id="choices--d9ga-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Russian" data-select-text="Press to select" data-choice-selectable="">Russian</div><div id="choices--d9ga-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Spanish" data-select-text="Press to select" data-choice-selectable="">Spanish</div></div></div></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-1">--}}
{{--                        <button type="button" class="btn btn-primary mb-0 rounded z-index-1 w-100"><i class="fas fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="row mt-3">
                <div class="col-12">
                    <div class="row g-4">
                        @forelse($courses as $course)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="card shadow h-100">
                                <img src="{{ asset($course->image) }}" class="card-img-top" alt="course image" style="max-width: 298px !important; max-height: 223px !important;">
                                <div class="card-img-overlay">
                                    <div class="card-element-hover d-flex justify-content-end">
                                        <a href="course-enrollment-details/{{ $course->id }}" class="bg-white rounded text-center">
                                            &nbsp;<i class="fas fa-book-reader icon-gradient"></i> <span style="color: #586eff;">Overview</span>&nbsp;
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="#" class="badge bg-purple bg-opacity-10 text-purple">{{ $course->courseCategory->name }}</a>
                                        @if(\Illuminate\Support\Facades\Auth::check() && enrollmentStatus($course->id, auth()->user()->id))
                                                <span class="badge bg-success bg-opacity-10 text-success">Enrolled</span>
                                        @endif
                                    </div>
                                    <h5 class="card-title"><a href="#">{{ $course->title }}</a></h5>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                        <li class="list-inline-item ms-2 h6 fw-light mb-0">4.0/5.0</li>
                                    </ul>
                                </div>
                                <div class="card-footer pt-0 pb-3">
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>{{ $course->duration }} Houre</span>
                                        <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>{{ $course->total_lessons }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="text-center">No Course Found</div>
                        @endforelse
                    </div>
                    <div class="col-12 mt-4">
                        <div class="card-footer bg-transparent pt-0">
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                <p class="mb-0 text-center text-sm-start">Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} entries</p>
                                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                        @if ($courses->onFirstPage())
                                            <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                        @else
                                            <li class="page-item mb-0"><a class="page-link" href="{{ $courses->previousPageUrl() }}" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                        @endif
                                        @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                                            <li class="page-item mb-0 {{ $page == $courses->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endforeach
                                        @if ($courses->hasMorePages())
                                            <li class="page-item mb-0"><a class="page-link" href="{{ $courses->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
                                        @else
                                            <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
