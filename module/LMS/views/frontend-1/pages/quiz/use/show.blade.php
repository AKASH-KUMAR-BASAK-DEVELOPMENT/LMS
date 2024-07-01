@extends('frontend-1.layout.app')
@section('content')

    <!-- =======================
        Page intro START -->
    <section class="bg-light py-0">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-8">
                    <!-- Badge -->
                    <h6 class="mb-3 font-base bg-primary text-white py-2 px-4 rounded-2 d-inline-block">{{ $exam->course->title }}</h6>
                    <!-- Title -->
                    <h1>{{ $exam->name }} quiz</h1>
                    <!-- Content -->
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>0</li>
                        <li class="list-inline-item h6 me-3 mb-1 mb-sm-0"><i class="bi bi-patch-exclamation-fill text-danger me-2"></i>Last updated {{ \Carbon\Carbon::parse($exam->updated_at)->format('d M Y') }}</li>
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
                                    <button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1" aria-selected="true">All question listed below</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Tabs END -->

                        <!-- Tab contents START -->
                        <div class="card-body p-4">
                            <div class="tab-content pt-2" id="course-pills-tabContent">
                                <!-- Content START -->
                                <div class="tab-pane fade active show" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                                    <!-- Course accordion START -->
                                    @foreach($exam->questions as $index => $question)
                                        <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                                            <div class="accordion-item mb-3">
                                                <h6 class="accordion-header font-base" id="heading-{{ $index }}">
                                                    <button class="accordion-button fw-bold rounded d-sm-flex d-inline-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}">
                                                        {{ $question->title }}<span class="small ms-0 ms-sm-2" style="background-color: #11a472; color:aliceblue; border-radius:10px; font-size:10px">&nbsp; {{ ucfirst(str_replace('-', ' ', strtolower($question->type))) }}
 &nbsp;</span>
                                                    </button>
                                                </h6>
                                                <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body mt-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="position-relative d-flex align-items-center">
                                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">
                                                                        @if($question->image)
                                                                                <img src="{{ asset($question->image) }}" width="100px" height="100px">
                                                                                <br><br>
                                                                            @endif
                                                                            @if($question->type === 'selection' || $question->type === 'multiple-choice')
                                                                                @foreach(json_decode($question->option) as $item)
                                                                                    @if($item)
                                                                                        <li>{{ $item }}</li>
                                                                                    @endif
                                                                                @endforeach
                                                                            @elseif($question->type === 'fill-in-the-blanks')
                                                                                <p>{{ $question->option }}</p>
                                                                            @endif
                                                                        </span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach

                                <!-- Course accordion END -->
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

                            <!-- Course info START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-3">This exam includes</h4>
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Total Question</span>
                                        <span>{{ sizeof($exam->questions) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
                                        <span>{{ $exam->duration }}m</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Passed Mark</span>
                                        <span>{{ $exam->pass_mark }}</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Course info END -->
                        </div>
                    </div><!-- Row End -->
                </div>
                <!-- Right sidebar END -->

            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection
