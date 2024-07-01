<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\ExamModel;
use Module\LMS\Services\QuestionService;

class ExamController extends Controller
{
    private $service;
    protected $questionService;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['exams'] = ExamModel::active()
                                ->where('type', 'exam')
                                ->where('created_by', auth()->user()->id)
                                ->orWhereHas('course.courseEnrollments', function ($query) {
                                    $query->where('user_id', auth()->user()->id)
                                        ->where('status', 1);
                                })
                                ->get();
        return view('frontend-1.pages.exams.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['courses'] = CourseModel::active()->get();
        return view('frontend-1.pages.exams.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $exam = $this->storeOrUpdate($request, null);
            $this->questionService->storeOrUpdate($request, null, $exam);
        });
        return redirect()->route('exams.index');
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['exam'] = ExamModel::with('questions')->find($id);
        return view('frontend-1.pages.exams.show', $data);
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

    public function storeOrUpdate($request, $id)
    {
        $exam = ExamModel::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'course_id' => $request->course_id,
                'date' => $request->date,
                'duration' => $request->duration,
                'pass_mark' => $request->pass_mark,
                'type' => 'exam',
            ]
        );

        return $exam;
    }
}
