<?php

namespace Module\LMS\Models;

use App\Model;

class CourseCurriculumTopicModel extends Model
{
    protected $table = 'course_curriculum_topics';

    public function curriculum()
    {
        return $this->belongsTo(CourseCurriculumModel::class, 'curriculum_id', 'id');
    }

    public function learningResource()
    {
        return $this->hasMany(LearningResourceModel::class, 'course_curriculum_topic_id', 'id');
    }
}
