<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\QuestionModel;
use Module\LMS\Models\StudentExamAnswerSheetModel;

class QuizQuestionAnswerController extends Controller
{
    public function quizAnswer(Request $request){
        $answer = $request->input('Answer');
        if (is_array($answer)) {
            $answer = implode(", ", $request->input('Answer'));
        }
        if (preg_match('/^\d+\.\s*/m', $answer)) {
            $answer = preg_replace('/\d+\.\s*/', '', $answer);
            $answer = trim($answer);
            $answer = preg_replace('/\s*\n\s*/', ', ', $answer);
        }
        $question = QuestionModel::find($request->input('QuestionId'));
        if ($question->answer == $answer){
            $mark = $question->mark;
        }
        $exists = StudentExamAnswerSheetModel::where('student_exam_enrollment_id', $request->input('ExamEnrollmentId'))
            ->where('question_id', $request->input('QuestionId'))
            ->exists();
        if ($answer){
            if ($exists){
                StudentExamAnswerSheetModel::updateOrCreate(
                    [
                        'student_exam_enrollment_id' => $request->input('ExamEnrollmentId'),
                        'question_id' => $request->input('QuestionId'),
                    ],
                    [
                        'answer' => $answer,
                        'mark' => $mark ?? 00,
                    ]
                );
            }
            else{
                StudentExamAnswerSheetModel::updateOrCreate(
                    [
                        'id' => null
                    ],
                    [
                        'student_exam_enrollment_id' => $request->input('ExamEnrollmentId'),
                        'question_id' => $request->input('QuestionId'),
                        'answer' => $answer,
                        'mark' => $mark ?? 00,
                    ]
                );
            }
        }
        return response()->json($answer);
    }

    public function examAnswerMarking(Request $request){
        foreach ($request->student_exam_answer_sheet_id as $index => $value){
            if ($request->mark[$index]){
                StudentExamAnswerSheetModel::updateOrCreate(
                    [
                        'id' => $value
                    ],
                    [
                        'mark' => $request->mark[$index]
                    ]
                );
            }
        }
        return redirect()->route('student-exam-enrollments.index');
    }
}
