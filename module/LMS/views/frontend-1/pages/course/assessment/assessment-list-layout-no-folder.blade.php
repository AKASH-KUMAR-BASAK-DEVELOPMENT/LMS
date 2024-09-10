@if(\Module\LMS\Models\CourseAssessmentModel::where('curriculum_id', $curriculum->id)->where('folder_id', null)->count() > 0)
    <div class="col-12 mb-1">
        <div>
            <!-- Comment -->
            <div class="p-2">
                @foreach(\Module\LMS\Models\CourseAssessmentModel::where('curriculum_id', $curriculum->id)->where('folder_id', null)->get() as $exam)
                    <span><i class="fa fa-box-open text-info"></i> &nbsp;&nbsp;&nbsp; <a
                            href="{{ route('course-assessment.show', $exam->id) }}"
                            target="_blank"
                            title="Assignment"
                            class="text-decoration-none text-reset"> {{ $exam->title }}</a>
                                                                                                    &nbsp;&nbsp;
                        @if(Route::currentRouteName() == 'course.edit')
                            <button
                                class="btn btn-sm btn-danger-soft btn-round mb-1 delete-topic"
                                onclick="deleteTopic({{ $exam->id }})">
                                                                                                            <i class="fas fa-fw fa-times"></i>
                                                                                                        </button>
                        @endif
                                                                                                    </span> <br>
                @endforeach
            </div>
        </div>
    </div>
@endif
