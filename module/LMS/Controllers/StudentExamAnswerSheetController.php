<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\StudentExamAnswerSheetModel;
use Module\LMS\Models\StudentExamEnrollmentModel;

class StudentExamAnswerSheetController extends Controller
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
        //
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
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['examEnrollment'] = StudentExamEnrollmentModel::find($id);
        $data['examAnswerSheets'] = StudentExamAnswerSheetModel::where('student_exam_enrollment_id', $id)->get();
        return view('frontend-1.pages.student-exam-answer-sheet.show', $data);
    }

    public function showStudentResult($id)
    {
        $data['examEnrollment'] = StudentExamEnrollmentModel::find($id);
        $data['examAnswerSheets'] = StudentExamAnswerSheetModel::where('student_exam_enrollment_id', $id)->get();
        return view('frontend-1.pages.student-exam-answer-sheet.show-students-result', $data);
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
