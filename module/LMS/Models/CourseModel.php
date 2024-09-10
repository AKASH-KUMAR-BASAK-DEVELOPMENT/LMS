<?php

namespace Module\LMS\Models;

use App\Model;
use App\Models\User;
use App\Traits\AutoCreatedUpdated;

class CourseModel extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'courses';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategoryModel::class, 'course_category_id', 'id');
    }

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevelModel::class, 'course_level_id', 'id');
    }

    public function courseScormPackages()
    {
        return $this->hasMany(ScormPackageModel::class, 'curriculum_id', 'id');
    }

    public function courseCurriculum()
    {
        return $this->hasMany(CourseCurriculumModel::class, 'course_id', 'id');
    }

    public function courseEnrollments(){
        return $this->hasMany(CourseEnrolledModel::class, 'course_id', 'id');
    }

    public function courseAssessments(){
        return $this->hasMany(CourseAssessmentModel::class, 'course_id', 'id');
    }


    public function scopeActive($query)
    {
        return parent::scopeActive($query);
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
