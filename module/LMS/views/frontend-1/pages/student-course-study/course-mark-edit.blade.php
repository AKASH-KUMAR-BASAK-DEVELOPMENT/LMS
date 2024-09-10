@extends('frontend-1.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Assign/Update Result for {{ $student->name }}</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('student-course-result.store') }}" method="post">
                @csrf
                <input type="hidden" name="student_course_result_id" value="{{ optional($result)->id }}">
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="course_id" value="{{ $course_id }}">
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Calculated Mark from Percentage(%)</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Total Assignment Mark
                                        </span>
                                    </div>
                                    @php
                                        $curriculums = \Module\LMS\Models\CourseCurriculumModel::where('course_id', $course_id)->pluck('id');
                                        $assignments = \Module\LMS\Models\CourseAssessmentModel::whereIn('curriculum_id', $curriculums)->pluck('id');
                                        $studentAssessments = \Module\LMS\Models\StudentAssessmentModel::whereIn('assessment_id', $assignments)->sum('mark');
                                    @endphp
                                    <input type="number" name="total_assignment_mark" class="form-control" value="{{ ($studentAssessments * $lmsSettings->course_curriculum_assignment_percentage) / 100 }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Total Manual Exam Mark
                                        </span>
                                    </div>
                                    @php
                                        $curriculums = \Module\LMS\Models\CourseCurriculumModel::where('course_id', $course_id)->pluck('id');
                                        $exams = \Module\LMS\Models\ExamModel::where('type', 'exam')->whereIn('course_curriculum_id', $curriculums)->pluck('id');
                                        $studentExamEnrollments = \Module\LMS\Models\StudentExamEnrollmentModel::where('user_id', $student->id)->whereIn('exam_id', $exams)->pluck('id');
                                        $studentExamAnswer = \Module\LMS\Models\StudentExamAnswerSheetModel::whereIn('student_exam_enrollment_id', $studentExamEnrollments)->sum('mark');
                                    @endphp
                                    <input type="number" name="total_manual_exam_mark" class="form-control" value="{{ ($lmsSettings->course_curriculum_exam_percentage * $studentExamAnswer) /100 }}" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Total AI Quiz mark
                                        </span>
                                    </div>
                                    @php
                                        $curriculums = \Module\LMS\Models\CourseCurriculumModel::where('course_id', $course_id)->pluck('id');
                                        $quiz = \Module\LMS\Models\ExamModel::where('type', 'quiz')->whereIn('course_curriculum_id', $curriculums)->pluck('id');
                                        $studentQuizEnrollments = \Module\LMS\Models\StudentExamEnrollmentModel::where('user_id', $student->id)->whereIn('exam_id', $exams)->pluck('id');
                                        $studentQuizAnswer = \Module\LMS\Models\StudentExamAnswerSheetModel::whereIn('student_exam_enrollment_id', $studentExamEnrollments)->sum('mark');
                                    @endphp
                                    <input type="number" name="total_ai_quiz_mark" class="form-control" value="{{ ($lmsSettings->course_curriculum_quiz_percentage * $studentQuizAnswer) / 100 }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Result</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Grade
                                        </span>
                                    </div>
                                    <select class="form-control" name="grade" required title="Hover option for see total grade mark">
                                        <option selected disabled>--Choose One--</option>
                                        <option value="competency" @if(isset($result->grade) && $result->grade == 'competency') selected @endif title="{{ $lmsSettings->course_competency_full_mark }}">Competency</option>
                                        <option value="credit transfer" @if(isset($result->grade) && $result->grade == 'credit_transfer') selected @endif title="{{ $lmsSettings->course_credit_transfer_mark }}">Credit Transfer</option>
                                        <option value="not yet started" @if(isset($result->grade) && $result->grade == 'not_yet_started') selected @endif title="{{ $lmsSettings->course_not_yet_started_mark }}">Not Yet Started</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon9">
                                            Advice
                                        </span>
                                    </div>
                                    <textarea name="advice" class="form-control" rows="3" placeholder="Write about this result">{{ optional($result)->advice }}</textarea>
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
