@foreach($folders as $folder)
    <div class="col-12 mb-1">
        <div class="row mb-1">
            <div class="col-md-6">
                <i class="fa fa-folder text-info"></i> <span>{{ $folder->name }}</span> &nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-md-6">
                @if(Route::currentRouteName() == 'course.edit')
                    <button
                        class="btn btn-sm btn-dark mb-0"
                        data-bs-toggle="modal"
                        data-bs-target="#addTopic"
                        data-curriculum-id="{{ $folder->course_curriculum_id }}"
                        onclick="setModalTarget({{ $index + 1 }}, {{ $folder->id }})">
                        <i class="bi bi-plus-circle me-2"></i>Add
                        an activity or resource
                    </button>

                    <button
                        class="btn btn-sm btn-danger-soft btn-round mb-0 delete-topic"
                        onclick="folderDelete({{ $folder->id }})">
                        <i class="fas fa-fw fa-times"></i>
                    </button>
                @endif
            </div>
        </div>

        <div class="p-2">
        @include('frontend-1.pages.course.scorm-package.scorm-package-list-layout')
        @include('frontend-1.pages.course.topic.topic-list-layout')
        @include('frontend-1.pages.course.image.image-list-layout')
        @include('frontend-1.pages.course.video.video-list-layout')
        @include('frontend-1.pages.course.pdf.pdf-list-layout')
        @include('frontend-1.pages.course.excel.excel-list-layout')
        @include('frontend-1.pages.course.exam.exam-list-layout')
        @include('frontend-1.pages.course.quiz.quiz-list-layout')
        @include('frontend-1.pages.course.assessment.assessment-list-layout')

        @if($folder->innerFolderRecursive->count() > 0)
            <div class="p-2">
                @include('frontend-1.pages.course.folder.folder_recursive_edit', ['folders' => $folder->innerFolderRecursive, 'index' => $index])
            </div>
        @endif
        </div>
    </div>
@endforeach
