<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;
use App\Traits\AutoCreatedUpdated;

class StudentExamEnrollmentModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'student_exam_enrollments';

    public function exam()
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function studentExamAnswerSheets()
    {
        return $this->hasMany(StudentExamAnswerSheetModel::class, 'student_exam_enrollment_id', 'id');
    }

    public function studentExamAnswerSheetsMarked()
    {
        return $this->hasMany(StudentExamAnswerSheetModel::class, 'student_exam_enrollment_id', 'id')
            ->whereNotNull('mark');
    }

    public function studentExamAnswerSheetsTotalMark()
    {
        return $this->studentExamAnswerSheets()->sum('mark');
    }
}
