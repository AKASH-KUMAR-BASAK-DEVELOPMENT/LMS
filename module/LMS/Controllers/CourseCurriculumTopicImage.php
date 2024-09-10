<?php

namespace Module\LMS\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicFolderModel;
use Module\LMS\Models\CourseCurriculumTopicModel;
use Module\LMS\Models\LearningResourceModel;

class CourseCurriculumTopicImage extends Controller
{
    private $service;
    use FileSaver;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create($id, $folder)
    {
        $curriculum = CourseCurriculumModel::find($id);
        $folder = CourseCurriculumTopicFolderModel::find($folder);
        return view('frontend-1.pages.course.image.create', compact('curriculum', 'folder'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $topic = CourseCurriculumTopicModel::updateOrCreate(
            [
                'id' => null,
            ],
            [
                'curriculum_id' => $request->curriculum_id,
                'name' => $request->topic_name,
                'description' => $request->topic_description ?? '',
                'type' => 'image',
                'folder_id' => $request->folder_id,
            ]
        );

        //image
        if (isset($request->topic_image)) {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => null,
                ],
                [
                    'course_curriculum_topic_id' => $topic->id,
                    'type' => 'image',
                ]
            );
            $this->upload_file($request->topic_image, $learningResource, 'link', 'upload/topic_' . 'image' . '_' . $learningResource->id);
        }

        return redirect()->back();
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        # code...
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        # code...
    }
}
