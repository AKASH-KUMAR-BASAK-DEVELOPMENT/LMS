<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\ExamModel;

class StudentExamsController extends Controller
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
        $data['exams'] = ExamModel::active()->where('type', 'exam')->whereHas('curriculum.course.courseEnrollments', function ($query) {
            $query->where('user_id', auth()->user()->id)
                ->where('status', 1);
        })
            ->whereDoesntHave('examEnrollments', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->orWhereHas('examEnrollments', function ($query) {
                $query->where('is_retake', 1);
            })
            ->get();
//        $data['exams'] = ExamModel::active()
//            ->where('type', 'exam')
//            ->whereHas('curriculum.course.courseEnrollments', function ($query) {
//                $query->where('user_id', auth()->user()->id)
//                    ->where('status', 1);
//            })
//            ->whereDoesntHave('examEnrollments', function ($query) {
//                $query->where('user_id', auth()->user()->id);
//            })
//            ->orWhereHas('examEnrollments', function ($query) {
//                $query->where('is_retake', 1);
//            })
//            ->get();
        return view('frontend-1.pages.student-exam.index', $data);
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
