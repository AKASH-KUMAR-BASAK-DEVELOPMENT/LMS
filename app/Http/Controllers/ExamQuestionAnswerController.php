<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Module\LMS\Models\StudentExamAnswerSheetModel;

class ExamQuestionAnswerController extends Controller
{
    public function examAnswer(Request $request){
        $answer = $request->input('Answer');
        if (is_array($answer)) {
            $answer = implode(",", $request->input('Answer'));
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
                    ]
                );
            }
        }
        return 1;
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
