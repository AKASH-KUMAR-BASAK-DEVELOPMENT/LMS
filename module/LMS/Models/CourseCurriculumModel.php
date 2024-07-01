<?php

namespace Module\LMS\Models;

use App\Model;
use App\Traits\AutoCreatedUpdated;

class CourseCurriculumModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'course_curriculums';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }

    public function curriculumTopics()
    {
        return $this->hasMany(CourseCurriculumTopicModel::class, 'curriculum_id', 'id');
    }
}
