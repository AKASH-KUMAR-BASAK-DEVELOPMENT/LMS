<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;

class StudentAssessmentModel extends Model
{
    protected $table = 'student_assessments';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
