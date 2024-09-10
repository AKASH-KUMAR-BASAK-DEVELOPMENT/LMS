<?php

namespace Module\LMS\Models;

use App\Model;
use Module\LMS\Controllers\CourseCurriculumTopicImage;

class CourseCurriculumTopicFolderModel extends Model
{
    protected $table = 'folders';

    public function curriculum_topic()
    {
        return $this->belongsTo(CourseCurriculumModel::class, 'course_curriculums', 'id');
    }

    public function innerFolderRecursive()
    {
        return $this->hasMany(self::class, 'folder_id', 'id')
            ->with('innerFolderRecursive'); // Recursively load innerFolder
    }

}
