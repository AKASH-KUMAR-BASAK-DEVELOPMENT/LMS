<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;

class CourseCategoryModel extends Model
{
    protected $table = 'course_categories';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
