@if(\Module\LMS\Models\ScormPackageModel::where('curriculum_id', $curriculum->id)->where('folder_id', null)->count() > 0)
    <div class="col-12 mb-1">
        <div>
            <!-- Comment -->
            <div class="p-2">
                @foreach(\Module\LMS\Models\ScormPackageModel::where('curriculum_id', $curriculum->id)->where('folder_id', null)->get() as $courseScormPackage )
                    <span><i class="fa fa-archive text-success"></i> <a class="text-decoration-none text-reset" href="/scorm/{{ $courseScormPackage->link }}" title="Scorm Package">{{ $courseScormPackage->link }}</a> &nbsp;&nbsp;&nbsp;

                        @if(Route::currentRouteName() == 'course.edit')
                                                                                                            <button
                                                                                                                class="btn btn-sm btn-danger-soft btn-round mb-1 delete-topic"
                                                                                                                onclick="scromPackageDelete({{ $courseScormPackage->id }})">
                                                                                                            <i class="fas fa-fw fa-times"></i>
                                                                                                        </button>
                        @endif
                                                                                                        </span> <br>
                @endforeach
            </div>
        </div>
    </div>
@endif
