<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;
use App\Traits\AutoCreatedUpdated;

class ExamModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'exams';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }

    public function questions(){
        return $this->hasMany(QuestionModel::class, 'exam_id', 'id');
    }

    public function questionsTotalMark(){
        return $this->questions()->sum('mark');
    }

    public function examEnrollments(){
        return $this->hasMany(StudentExamEnrollmentModel::class, 'exam_id', 'id');
    }

    public function scopeActive($query)
    {
        return parent::scopeActive($query);
    }

    public function createdUser(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
