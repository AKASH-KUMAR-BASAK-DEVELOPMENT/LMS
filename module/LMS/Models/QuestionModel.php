<?php

namespace Module\LMS\Models;

use App\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';

    public function exam()
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'id');
    }
}
