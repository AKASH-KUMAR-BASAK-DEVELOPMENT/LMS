<?php

namespace Module\LMS\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicFolderModel;
use Module\LMS\Models\CourseCurriculumTopicModel;
use Module\LMS\Models\LearningResourceModel;

class CourseCurriculumTopicController extends Controller
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
        return view('frontend-1.pages.course.topic.create', compact('curriculum', 'folder'));
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
                'type' => 'topic',
                'folder_id' => $request->folder_id,
            ]
        );

        //url
        if (isset($request->topic_video_link)) {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => null,
                ],
                [
                    'type' => 'url',
                    'course_curriculum_topic_id' => $topic->id,
                    'link' => $request->topic_video_link
                ]
            );
        }

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

        //video
        if (isset($request->topic_video)) {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => null,
                ],
                [
                    'course_curriculum_topic_id' => $topic->id,
                    'type' => 'video',
                ]
            );
            $this->upload_file($request->topic_video, $learningResource, 'link', 'upload/topic_' . 'video' . '_' . $learningResource->id);
        }

        //document
        if (isset($request->topic_document)) {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => null,
                ],
                [
                    'course_curriculum_topic_id' => $topic->id,
                    'type' => 'document',
                ]
            );
            $this->upload_file($request->topic_document, $learningResource, 'link', 'upload/topic_' . 'document' . '_' . $learningResource->id);
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
        $topic = CourseCurriculumTopicModel::find($id);
        return view('frontend-1.pages.course.topic.show', compact('topic'));
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
