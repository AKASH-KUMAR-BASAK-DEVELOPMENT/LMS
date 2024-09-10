<?php

namespace Module\LMS\Controllers;

use App\Models\User;
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
        $data['users'] = User::whereHas('role', function ($query){
            $query->whereIn('id', [2, 3, 4, 6]);
        })->get();
        $data['courses'] = CourseModel::all();
        return view('backend.pages.student-enrollment.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $enrollmentStatusCheck = CourseEnrolledModel::where('course_id', $request->course_id)->where('user_id', $request->user_id)->count();
        if ($enrollmentStatusCheck > 0){
            return redirect()->back()->with('error', 'Enrollment Already Exist!');
        }
        if ($enrollmentStatusCheck < 1){
            CourseEnrolledModel::firstOrCreate(
                [
                    'course_id' => $request->course_id,
                    'user_id' => $request->user_id,
                    'status' => 1
                ]
            );
            return redirect()->route('dashboard-student-enrollments.index');
        }
        return redirect()->route('dashboard-student-enrollments.index');

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
