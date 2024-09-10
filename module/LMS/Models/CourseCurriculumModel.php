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

    public function curriculumScormPackage()
    {
        return $this->hasMany(ScormPackageModel::class, 'curriculum_id', 'id');
    }

    public function curriculumFolder()
    {
        return $this->hasMany(CourseCurriculumTopicFolderModel::class, 'course_curriculum_id', 'id');
    }

    //test work not confirm
    public function courseEnrollments(){
        return $this->hasMany(CourseEnrolledModel::class, 'course_id', 'id');
    }

    public function curriculumAssessments(){
        return $this->hasMany(CourseAssessmentModel::class, 'curriculum_id', 'id');
    }
}
