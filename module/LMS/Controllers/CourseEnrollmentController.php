<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseEnrolledModel;
use Module\LMS\Models\CourseModel;

class CourseEnrollmentController extends Controller
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
        $data['studentEnrollments']= CourseEnrolledModel::all();
        return view('backend.pages.student-enrollment.index', $data);
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

    public function details($id)
    {
        $course = CourseModel::find($id);
        return view('frontend-1.pages.enrollment.details', compact('course'));
    }

    public function apply($id)
    {
        $course = CourseModel::find($id);
        try {
            $enrollment = CourseEnrolledModel::firstOrCreate(
                [
                    'course_id' => $id,
                    'user_id' => auth()->user()->id,
                    'status' => 0
                ]
            );
        }
        catch (\Exception $e){
            $enrollment = '';
        }

        return view('frontend-1.pages.enrollment.confirm', compact('course', 'enrollment'));
    }

    public function confirm($id)
    {
        if (CourseEnrolledModel::find($id)->status == 0){
            $enrollment = CourseEnrolledModel::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'status' => 1
                ]
            );
        }
        return redirect()->back();
    }
}
