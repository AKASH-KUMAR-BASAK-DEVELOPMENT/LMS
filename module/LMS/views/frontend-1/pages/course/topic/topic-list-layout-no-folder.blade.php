@if(\Module\LMS\Models\CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->where('type', 'topic')->where('folder_id', null)->count() > 0)
    <div class="col-12 mb-1">
        <div>
            <!-- Comment -->
            <div class="p-2">
                @foreach(\Module\LMS\Models\CourseCurriculumTopicModel::with('learningResource')->where('curriculum_id', $curriculum->id)->where('type', 'topic')->where('folder_id', null)->get() as $topic)
                    <span><i class="fa fa-file text-purple"></i> &nbsp;&nbsp;&nbsp; <a
                            href="/topic/{{ $topic->id }}"
                            target="_blank"
                            title="Topic"
                            class="text-decoration-none text-reset"> {{ $topic->name }}</a>
                                                                                                    &nbsp;&nbsp;
                        @if(Route::currentRouteName() == 'course.edit')
                                                                                                        <button
                                                                                                            class="btn btn-sm btn-danger-soft btn-round mb-1 delete-topic"
                                                                                                            onclick="deleteTopic({{ $topic->id }})">
                                                                                                            <i class="fas fa-fw fa-times"></i>
                                                                                                        </button>
                        @endif
                                                                                                    </span> <br>
                @endforeach
            </div>
        </div>
    </div>
@endif
