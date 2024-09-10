<?php


namespace Module\LMS\Models;


use App\Model;

class ScormPackageModel extends Model
{
    protected $table = 'course_scorm_packages';

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
