@extends('frontend-1.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update LMS Global Settings</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('lms-settings.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Exam, Quiz, Assignment</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Assignment percentage
                                        </span>
                                    </div>
                                    <input type="number" name="course_curriculum_assignment_percentage" class="form-control" value="{{ $lmsSettings->course_curriculum_assignment_percentage }}" placeholder="">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                           %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Manual Exam percentage
                                        </span>
                                    </div>
                                    <input type="number" name="course_curriculum_exam_percentage" class="form-control" value="{{ $lmsSettings->course_curriculum_exam_percentage }}" placeholder="">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                           %
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            AI Quiz percentage
                                        </span>
                                    </div>
                                    <input type="number" name="course_curriculum_quiz_percentage" class="form-control" value="{{ $lmsSettings->course_curriculum_quiz_percentage }}" placeholder="">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                           %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Grade</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Competency mark
                                        </span>
                                    </div>
                                    <input type="number" name="course_competency_full_mark" class="form-control" value="{{ $lmsSettings->course_competency_full_mark }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Credit transfer mark
                                        </span>
                                    </div>
                                    <input type="number" name="course_credit_transfer_mark" class="form-control" value="{{ $lmsSettings->course_credit_transfer_mark }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Not yet started mark
                                        </span>
                                    </div>
                                    <input type="number" name="course_not_yet_started_mark" class="form-control" value="{{ $lmsSettings->course_not_yet_started_mark }}" placeholder="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 text-center">
                        <button type="submit" class="btn hor-grd btn-grd-success text-white rounded">&nbsp;Update&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
