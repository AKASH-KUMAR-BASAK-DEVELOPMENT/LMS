<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;

class CourseEnrolledModel extends Model
{
    protected $table = 'course_enrollments';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeActive($query)
    {
        return parent::scopeActive($query);
    }
}
