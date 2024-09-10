<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\ExamModel;
use Module\LMS\Models\StudentExamAnswerSheetModel;
use Module\LMS\Models\StudentExamEnrollmentModel;

class StudentExamEnrollmentController extends Controller
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
        $data['studentExamEnrollments'] = StudentExamEnrollmentModel::whereHas('exam', function ($query) {
            $query->where('type', 'exam');
            $query->whereHas('curriculum.course', function ($subQuery) {
                $subQuery->whereHas('courseEnrollments', function ($subSubQuery) {
                    $subSubQuery->where('user_id', auth()->user()->id)
                        ->where('status', 1);
                })
                    ->orWhere('created_by', auth()->user()->id);
            });
        })
            ->paginate(10);
        return view('frontend-1.pages.enrollment.exam-index', $data);
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
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['exam'] = ExamModel::with('questions')->find($id);
        $exist = StudentExamEnrollmentModel::where('exam_id', $id)->where('user_id', auth()->user()->id)->exists();
        if (!$exist){
            $data['studentExamEnrollment'] = StudentExamEnrollmentModel::create(
                [
                    'exam_id' => $id,
                    'user_id' => auth()->user()->id,
                    'is_retake' => 0,
                ]
            );
        }
        else{
            StudentExamEnrollmentModel::where('exam_id', $id)->where('user_id', auth()->user()->id)->update([
                'is_retake' => 0,
            ]);
            $data['studentExamEnrollment'] = StudentExamEnrollmentModel::where('exam_id', $id)->where('user_id', auth()->user()->id)->first();
        }
        return view('frontend-1.pages.student-exam.exam-answer-sheet', $data);
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

    public function retakeRequest($id){
        StudentExamEnrollmentModel::where('id', $id)->update(
            [
                'retake_request' => 1
            ]
        );
        return redirect()->back()->with('request-success', 'Retake Request Send Successfully');
    }

    public function retakeRequestAccept($id){
        StudentExamEnrollmentModel::where('id', $id)->update(
            [
                'retake_request' => 0,
                'is_retake' => 1
            ]
        );
        return redirect()->back()->with('accept-success', 'Retake Request Accepted');
    }

    public function examStartConfirmationPage($id)
    {
        dd('ok');
        $data['examId'] = $id;
        return view('frontend-1.pages.student-exam.exam-start-confirmation', $data);
    }
}
