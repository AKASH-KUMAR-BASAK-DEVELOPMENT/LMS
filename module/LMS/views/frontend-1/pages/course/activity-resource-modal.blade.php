<!-- Popup modal for add topic START -->
<div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" aria-hidden="true"
     style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="addTopicLabel">Add an activity or resource</h5>
                <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i></button>
            </div>
            <div class="modal-body" style="background-color: #ececec;">
                <div class="row g-3">
                    <div class="col-md-2">
                        <a href="{{ route('topic.create', ['id' => '']) }}" id="topicLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-blue"><i
                                            class="fa fa-book-reader text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Topic</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('image.create', ['id' => '']) }}" id="imageLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-green"><i class="fa fa-image text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Image</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('video.create', ['id' => '']) }}" id="videoLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-oceanblue"><i
                                            class="fa fa-video text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Video</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('pdf.create', ['id' => '']) }}" id="pdfLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-red"><i class="fa fa-file-pdf text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">PDF</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('excel.create', ['id' => '']) }}" id="excelLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-blue"><i
                                            class="fa fa-file-excel text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Excel</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <div class="card p-3 custom-card">
                            <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                <div class="icon-container-purple"><i
                                        class="fa fa-fingerprint text-white fa-3x"></i></div>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                <span style="font-size: 12px;">Attendence</span>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                <span><i class="fa fa-info-circle"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card p-3 custom-card">
                            <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                <div class="icon-container-pink"><i class="fa fa-envelope text-white fa-3x"></i>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                <span style="font-size: 12px;">Chat</span>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                <span><i class="fa fa-info-circle"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('exams.create', ['id' => '']) }}" id="examLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-yellow"><i class="fa fa-edit text-white fa-3x"></i></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Manual Exam</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('quiz.create', ['id' => '']) }}" id="quizLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-purple"><i class="fa fa-quidditch text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">AI Quiz</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('scorm-package.create', ['id' => '']) }}" id="scormPackageLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-red"><i class="fa fa-archive text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Scorm Package</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('folder.create', ['id' => '']) }}" id="folderLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-paste"><i class="fa fa-folder text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Folder</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('course-assessment.create', ['id' => '']) }}" id="assessmentLink"
                           data-img="{{ asset('frontend-1\assets\images\default-image.jpg') }}">
                            <div class="card p-3 custom-card">
                                <div class="d-flex flex-row justify-content-center align-items-center mb-1">
                                    <div class="icon-container-light-purple"><i class="fa fa-globe text-white fa-3x"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-2">
                                    <span style="font-size: 12px;">Assignment</span>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <span><i class="fa fa-star"></i></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal for add topic END -->
