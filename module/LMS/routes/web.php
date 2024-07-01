<?php

use App\Http\Controllers\ExamQuestionAnswerController;
use Illuminate\Support\Facades\Route;
use Module\LMS\Controllers\CourseAssessmentController;
use Module\LMS\Controllers\CourseCategoryController;
use Module\LMS\Controllers\CourseController;
use Module\LMS\Controllers\CourseEnrollmentController;
use Module\LMS\Controllers\CourseLevelController;
use Module\LMS\Controllers\ExamController;
use Module\LMS\Controllers\QuizController;
use Module\LMS\Controllers\QuizQuestionAnswerController;
use Module\LMS\Controllers\SearchController;
use Module\LMS\Controllers\SigninController;
use Module\LMS\Controllers\StudentAssessmentController;
use Module\LMS\Controllers\StudentController;
use Module\LMS\Controllers\StudentCourseController;
use Module\LMS\Controllers\StudentCourseStudyController;
use Module\LMS\Controllers\StudentExamAnswerSheetController;
use Module\LMS\Controllers\StudentExamEnrollmentController;
use Module\LMS\Controllers\StudentExamsController;
use Module\LMS\Controllers\StudentQuizController;
use Module\LMS\Controllers\StudentQuizEnrollmentController;
use Module\LMS\Controllers\UserProfileController;
use Module\LMS\Models\CourseEnrolledModel;


Route::group(['prefix' => 'lms', 'as' => 'lms.', 'middleware' => 'web'], function (){
    Route::get('/student' , function (){
        dd('akash');
    });
});

Route::group(['middleware' => 'auth'], function (){
        Route::resource('course-category', CourseCategoryController::class);
        Route::resource('course-level', CourseLevelController::class);
        Route::resource('course', CourseController::class);
        Route::resource('students', StudentController::class);
        Route::resource('exams', ExamController::class);
        Route::resource('student-enrollments', CourseEnrollmentController::class);
        Route::resource('student-exams', StudentExamsController::class);
        Route::resource('student-exam-enrollments', StudentExamEnrollmentController::class);
        Route::resource('student-quiz', StudentQuizController::class);
        Route::resource('student-quiz-enrollments', StudentQuizEnrollmentController::class);
        Route::resource('student-exam-answer-sheet', StudentExamAnswerSheetController::class);
        Route::get('/course-enrollment-details/{id}', [CourseEnrollmentController::class, 'details']);
        Route::get('/course-enrollment-apply/{id}', [CourseEnrollmentController::class, 'apply']);
        Route::post('/exam-answer', [ExamQuestionAnswerController::class, 'examAnswer']);
        Route::post('/quiz-answer', [QuizQuestionAnswerController::class, 'quizAnswer']);
        Route::post('/exam-answer-marking', [ExamQuestionAnswerController::class, 'examAnswerMarking']);
        Route::get('/student-exam-answer-sheet-student-result/{id}', [StudentExamAnswerSheetController::class, 'showStudentResult']);
        Route::get('/scorm/{link}', [CourseController::class, 'scormResource']);
        Route::post('/delete-curriculum', [CourseController::class, 'deleteCurriculum']);
        Route::post('/delete-topic', [CourseController::class, 'deleteTopic']);
        Route::post('/delete-scorm-package', [CourseController::class, 'deleteScormPackage']);
        Route::get('/user-profile-show/{id}', [UserProfileController::class, 'userProfile']);
        Route::post('/user-profile-update', [UserProfileController::class, 'userUpdate']);
        Route::get('/my-courses', [StudentCourseController::class, 'index']);
        Route::resource('student-course-study',StudentCourseStudyController::class);
        Route::post('curriculum-completion-mark',[CourseController::class, 'curriculumCompletionMark']);
        Route::resource('quiz',QuizController::class);
        Route::resource('course-assessment',CourseAssessmentController::class);
        Route::resource('student-assessment',StudentAssessmentController::class);
        Route::get('student-exam-retake-request/{id}',[StudentExamEnrollmentController::class, 'retakeRequest']);
        Route::get('student-exam-retake-request-accept/{id}',[StudentExamEnrollmentController::class, 'retakeRequestAccept']);
        Route::get('certificate/{course_id}/{student_id}',[StudentCourseController::class, 'certificate']);
});
Route::resource('sign-in', SigninController::class);
Route::get('/course-frontend', [CourseController::class, 'frontendCourseIndex']);
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/live-search-autofill', [SearchController::class, 'liveSearchAutofill'])->name('liveSearchAutofill');

