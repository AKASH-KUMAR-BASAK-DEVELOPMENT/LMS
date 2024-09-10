@if(\Module\LMS\Models\ExamModel::where('course_curriculum_id', $curriculum->id)->where('type', 'exam')->where('folder_id',  $folder->id)->count() > 0)
    <div class="col-12 mb-1">
        <div>
            <!-- Comment -->
            <div class="p-2">
                @foreach(\Module\LMS\Models\ExamModel::where('course_curriculum_id', $curriculum->id)->where('type', 'exam')->where('folder_id', $folder->id)->get() as $exam)
                    <span><i class="fa fa-edit text-primary"></i> &nbsp;&nbsp;&nbsp; <a
                            href="/exams/{{ $exam->id }}"
                            target="_blank"
                            title="Exam"
                            class="text-decoration-none text-reset"> {{ $exam->name }}</a>
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
