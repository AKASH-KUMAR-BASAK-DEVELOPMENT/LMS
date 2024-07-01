<?php

namespace Module\LMS\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseAssessmentModel;
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
    public function create(Request $request)
    {
        $data['course'] = CourseModel::with('courseAssessments')->find($request->course_id);
        return view('frontend-1.pages.course.assessment', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $exists = CourseAssessmentModel::where('course_id' , $request->course_id)->first();
        $assessment = CourseAssessmentModel::updateOrCreate(
            [
                'id' => $exists->id ?? null,
            ],
            [
                'course_id' => $request->course_id,
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
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['assessment'] = CourseAssessmentModel::find($id);
        return view('frontend-1.pages.student-course-study.assessment', $data);
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
