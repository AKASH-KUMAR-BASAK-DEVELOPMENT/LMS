<?php

namespace Module\LMS\Models;

use App\Model;

class CourseAssessmentModel extends Model
{
    protected $table = 'course_assessments';

    public function curriculum()
    {
        return $this->belongsTo(CourseCurriculumModel::class, 'curriculum_id', 'id');
    }
}
