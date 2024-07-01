<?php

namespace Module\LMS\Models;

use App\Model;

class StudentExamAnswerSheetModel extends Model
{
    protected $table = 'student_exam_answer_sheets';

    public function studentExamEnrolment()
    {
        return $this->belongsTo(StudentExamEnrollmentModel::class, 'student_exam_enrollment_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(QuestionModel::class, 'question_id', 'id');
    }
}
