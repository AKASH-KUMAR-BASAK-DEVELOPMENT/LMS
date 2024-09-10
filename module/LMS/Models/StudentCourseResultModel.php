<?php

namespace Module\LMS\Models;

use App\Model;
use Illuminate\Foundation\Auth\User;

class StudentCourseResultModel extends Model
{
    protected $table = 'student_course_results';

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
