<?php

namespace Module\LMS\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseAssessmentModel;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicFolderModel;
use Module\LMS\Models\CourseModel;

class CourseAssessmentController extends Controller
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
        //
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create($id, $folder)
    {
        $curriculum = CourseCurriculumModel::with('curriculumAssessments')->find($id);
        $folder = CourseCurriculumTopicFolderModel::find($folder);
        return view('frontend-1.pages.course.assessment.create', compact('curriculum', 'folder'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $exists = CourseAssessmentModel::where('curriculum_id' , $request->curriculum_id)->first();
        $assessment = CourseAssessmentModel::updateOrCreate(
            [
                'id' => null,
            ],
            [
                'curriculum_id' =>           $request->curriculum_id,
                'title' =>                   $request->title,
                'description' =>             $request->description,
                'allow_submission_form' =>   $request->allow_submission_form,
                'due_date' =>                $request->due_date,
                'cut_off_date' =>            $request->cut_off_date,
                'remind_grade_buy' =>        $request->remind_grade_buy,
                'is_show_description' =>     $request->is_show_description,
                'folder_id' =>               $request->folder_id ?? null,
            ]
        );
        $this->upload_file($request->assessment, $assessment, 'link', 'assessment/upload/');
        return redirect()->route('course.edit', $request->course_id);
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['assessment'] = CourseAssessmentModel::with('curriculum')->find($id);
        return view('frontend-1.pages.course.assessment.show', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['assessment'] = CourseAssessmentModel::with('curriculum')->find($id);
        return view('frontend-1.pages.course.assessment.edit', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $assessment = CourseAssessmentModel::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'title' =>                   $request->title,
                'description' =>             $request->description,
                'allow_submission_form' =>   $request->allow_submission_form,
                'due_date' =>                $request->due_date,
                'cut_off_date' =>            $request->cut_off_date,
                'remind_grade_buy' =>        $request->remind_grade_buy,
                'is_show_description' =>     $request->is_show_description,
            ]
        );
        $this->upload_file($request->assessment, $assessment, 'link', 'assessment/upload/');
        return redirect()->route('course.edit', $request->course_id);
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
