<?php

use App\Http\Controllers\ExamQuestionAnswerController;
use Illuminate\Support\Facades\Route;
use Module\LMS\Controllers\CourseAssessmentController;
use Module\LMS\Controllers\CourseCategoryController;
use Module\LMS\Controllers\CourseController;
use Module\LMS\Controllers\CourseCurriculumTopicController;
use Module\LMS\Controllers\CourseCurriculumTopicExcel;
use Module\LMS\Controllers\CourseCurriculumTopicFolder;
use Module\LMS\Controllers\CourseCurriculumTopicImage;
use Module\LMS\Controllers\CourseCurriculumTopicPDF;
use Module\LMS\Controllers\CourseCurriculumTopicVideo;
use Module\LMS\Controllers\CourseEnrollmentController;
use Module\LMS\Controllers\CourseLevelController;
use Module\LMS\Controllers\ExamController;
use Module\LMS\Controllers\FeatureController;
use Module\LMS\Controllers\LmsSettingsController;
use Module\LMS\Controllers\QuizController;
use Module\LMS\Controllers\QuizQuestionAnswerController;
use Module\LMS\Controllers\ScormPackageController;
use Module\LMS\Controllers\SearchController;
use Module\LMS\Controllers\SigninController;
use Module\LMS\Controllers\SitemapController;
use Module\LMS\Controllers\StudentAssessmentController;
use Module\LMS\Controllers\StudentController;
use Module\LMS\Controllers\StudentCourseController;
use Module\LMS\Controllers\StudentCourseResultController;
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

Route::group(['middleware' => 'auth', 'blockip'], function (){
        Route::resource('course-category', CourseCategoryController::class);
        Route::resource('course-level', CourseLevelController::class);
        Route::resource('course', CourseController::class);
        Route::resource('students', StudentController::class);
        Route::resource('exams', ExamController::class);
        Route::get('exams/create/{id?}/{folder?}', [ExamController::class, 'create'])->name('exams.create');
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
        Route::post('/delete-folder', [CourseCurriculumTopicFolder::class, 'deleteFolder']);
        Route::get('/my-courses', [StudentCourseController::class, 'index']);
        Route::resource('student-course-study',StudentCourseStudyController::class);
        Route::post('curriculum-completion-mark',[CourseController::class, 'curriculumCompletionMark']);
        Route::resource('quiz',QuizController::class);
        Route::get('quiz/create/{id?}/{folder?}', [QuizController::class, 'create'])->name('quiz.create');
        Route::resource('course-assessment',CourseAssessmentController::class);
        Route::get('course-assessment/create/{id?}/{folder?}', [CourseAssessmentController::class, 'create'])->name('course-assessment.create');
        Route::resource('student-assessment',StudentAssessmentController::class);
        Route::get('student-assessment/index/{assessment_id?}', [StudentAssessmentController::class, 'index'])->name('student-assessment.index');
        Route::get('student-exam-retake-request/{id}',[StudentExamEnrollmentController::class, 'retakeRequest']);
        Route::get('student-exam-retake-request-accept/{id}',[StudentExamEnrollmentController::class, 'retakeRequestAccept']);
        Route::get('certificate/{course_id}/{student_id}',[StudentCourseController::class, 'certificate']);
        Route::get('/student-dashboard', function (){
            return view('frontend-1.pages.dashboard.student-dashboard');
        });
        Route::post('/insert-curriculum',[CourseController::class, 'insertCurriculum']);
    //course-features
    //1.scorm package
    Route::resource('scorm-package', ScormPackageController::class);
    Route::get('scorm-package/create/{id?}/{folder?}', [ScormPackageController::class, 'create'])->name('scorm-package.create');

    //2.topic feature
    Route::resource('topic', CourseCurriculumTopicController::class);
    Route::get('topic/create/{id?}/{folder?}', [CourseCurriculumTopicController::class, 'create'])->name('topic.create');

    //3.image feature
    Route::resource('image', CourseCurriculumTopicImage::class);
    Route::get('image/create/{id?}/{folder?}', [CourseCurriculumTopicImage::class, 'create'])->name('image.create');

    //4.video feature
    Route::resource('video', CourseCurriculumTopicVideo::class);
    Route::get('video/create/{id?}/{folder?}', [CourseCurriculumTopicVideo::class, 'create'])->name('video.create');

    //5.pdf feature
    Route::resource('pdf', CourseCurriculumTopicPDF::class);
    Route::get('pdf/create/{id?}/{folder?}', [CourseCurriculumTopicPDF::class, 'create'])->name('pdf.create');

    //6.excel feature
    Route::resource('excel', CourseCurriculumTopicExcel::class);
    Route::get('excel/create/{id?}/{folder?}', [CourseCurriculumTopicExcel::class, 'create'])->name('excel.create');

    //7.folder feature
    Route::resource('folder', CourseCurriculumTopicFolder::class);
    Route::get('folder/create/{id?}/{folder?}', [CourseCurriculumTopicFolder::class, 'create'])->name('folder.create');

    Route::resource('lms-settings',LmsSettingsController::class);
    Route::resource('student-course-result',StudentCourseResultController::class);
    Route::get('student-course-result/{student_id}/{course_id}/edit-student-result', [StudentCourseResultController::class, 'editStudentResult'])
        ->name('student-course-result.edit-student-result');
});


