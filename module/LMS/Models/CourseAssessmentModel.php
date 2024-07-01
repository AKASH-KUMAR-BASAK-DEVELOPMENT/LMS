<?php

namespace Module\LMS\Models;

use App\Model;

class CourseAssessmentModel extends Model
{
    protected $table = 'course_assessments';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
