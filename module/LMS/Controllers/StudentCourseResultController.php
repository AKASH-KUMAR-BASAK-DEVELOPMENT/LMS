<?php

namespace Module\LMS\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\LmsSettingsModel;
use Module\LMS\Models\StudentCourseResultModel;

class StudentCourseResultController extends Controller
{
    private $service;


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
    public function create()
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $studentResult = StudentCourseResultModel::updateOrCreate(
            [
                'id' => $request->student_course_result_id ?? null,
            ],
            $request->all()
        );
        return redirect()->route('student-course-result.edit-student-result', ['student_id' => $studentResult->student_id, 'course_id' => $studentResult->course_id]);
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['resultCard'] = StudentCourseResultModel::find($id);
        $data['lmsSettings'] = LmsSettingsModel::find(1) ?? new LmsSettingsModel();
        return view('frontend-1.pages.student-course.student-course-result-card', $data);
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

    public function editStudentResult($student_id, $course_id)
    {
        $data['result'] = StudentCourseResultModel::where('student_id', $student_id)->where('course_id', $course_id)->first();
        $data['lmsSettings'] = LmsSettingsModel::find(1) ?? new LmsSettingsModel();
        $data['student'] = User::find($student_id);
        $data['course_id'] = $course_id;
        return view('frontend-1.pages.student-course-study.course-mark-edit', $data);
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
