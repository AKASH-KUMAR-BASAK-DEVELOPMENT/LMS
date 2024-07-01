<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;

class CourseLevelModel extends Model
{
    protected $table = 'course_levels';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
