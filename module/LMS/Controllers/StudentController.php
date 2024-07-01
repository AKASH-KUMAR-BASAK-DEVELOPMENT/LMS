<?php

namespace Module\LMS\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Module\LMS\Models\CourseCategoryModel;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicModel;
use Module\LMS\Models\CourseEnrolledModel;
use Module\LMS\Models\CourseLevelModel;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\LearningResourceModel;
use Module\LMS\Models\ScormPackageModel;
use Module\LMS\Services\CourseService;

class StudentController extends Controller
{
    private $service;
    protected $courseService;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['students'] = CourseEnrolledModel::whereHas('user', function ($query){
            $query->where('role_id', 4);
        })->get();
        return view('frontend-1.pages.student.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
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
        //
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
        //
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        //
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        //
    }
}
