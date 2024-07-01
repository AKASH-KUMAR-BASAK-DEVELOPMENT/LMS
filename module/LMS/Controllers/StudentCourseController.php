<?php


namespace Module\LMS\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Module\LMS\Models\CourseEnrolledModel;
use Module\LMS\Models\CourseModel;

class StudentCourseController extends Controller
{
    public function index(){
        $data['courses'] = CourseModel::active()
                                            ->whereHas('courseEnrollments', function ($query) {
                                                $query->where('user_id', auth()->user()->id)->where('status', 1);
                                            })
                                            ->get();
        return view('frontend-1.pages.student-course.index', $data);
    }

    public function certificate($courseId, $studentId){
        $data['studentCourseCertificate'] = CourseModel::find($courseId);
        $data['student'] = User::find($studentId);
        return view('frontend-1.pages.student-course.certificate', $data);
    }
}
