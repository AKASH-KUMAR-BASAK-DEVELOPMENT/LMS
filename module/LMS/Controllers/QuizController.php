<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\ExamModel;
use Module\LMS\Services\QuestionService;
use Module\LMS\Services\QuizQuestionService;

class QuizController extends Controller
{
    private $service;
    protected $quizQuestionService;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(QuizQuestionService $quizQuestionService)
    {
        $this->quizQuestionService = $quizQuestionService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['exams'] = ExamModel::active()
            ->where('type', 'quiz')
            ->where('created_by', auth()->user()->id)
            ->orWhereHas('course.courseEnrollments', function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('status', 1);
            })
            ->get();
        return view('frontend-1.pages.quiz.build.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['courses'] = CourseModel::active()->get();
        return view('frontend-1.pages.quiz.build.create', $data);
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
            $this->quizQuestionService->storeOrUpdate($request, null, $exam);
        });
        return redirect()->route('quiz.index');
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
                'type' => 'quiz',
            ]
        );

        return $exam;
    }
}

