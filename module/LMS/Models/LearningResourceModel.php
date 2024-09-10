<?php

namespace Module\LMS\Models;

use App\Model;

class LearningResourceModel extends Model
{
    protected $table = 'learning_resources';

    public function courseCurriculumTopic()
    {
        return $this->belongsTo(CourseCurriculumTopicModel::class, 'course_curriculum_topic_id', 'id');
    }
}
