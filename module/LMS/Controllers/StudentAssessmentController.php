<?php

namespace Module\LMS\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseAssessmentModel;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\StudentAssessmentModel;

class StudentAssessmentController extends Controller
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
    public function index($assessment_id)
    {
        $data['studentAssessments'] = StudentAssessmentModel::where('assessment_id', $assessment_id)->paginate(10);
        $data['assessment'] = CourseAssessmentModel::find($assessment_id);
        return view('frontend-1.pages.course.assessment.index-student-assessment', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create(Request $request)
    {
        //
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $courseAssessment= CourseAssessmentModel::find($request->assessment_id);
        $exists = StudentAssessmentModel::where('assessment_id' , $courseAssessment->id)->where('user_id', auth()->user()->id)->first();
        $assessment = StudentAssessmentModel::updateOrCreate(
            [
                'id' => $exists->id ?? null,
            ],
            [
                'assessment_id' => $request->assessment_id,
                'title'         => $request->title,
                'user_id' => auth()->user()->id,
            ]
        );
        $this->upload_file($request->assessment, $assessment, 'link', 'assessment/upload/');
        return redirect()->back();
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        //
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['assessment'] = CourseAssessmentModel::with('curriculum')->find($id);
        $data['student_assessment'] = StudentAssessmentModel::where('assessment_id' , $id)->where('user_id', auth()->user()->id)->with('assessment')->first();
        return view('frontend-1.pages.student-course-study.assessment', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        StudentAssessmentModel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'mark' => $request->mark,
            ]
        );
        return redirect()->back();
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
