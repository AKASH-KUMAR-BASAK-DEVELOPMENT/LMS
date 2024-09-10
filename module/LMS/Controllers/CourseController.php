<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Module\LMS\Models\CourseCategoryModel;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicModel;
use Module\LMS\Models\CourseLevelModel;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\LearningResourceModel;
use Module\LMS\Models\ScormPackageModel;
use Module\LMS\Services\CourseService;

class CourseController extends Controller
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
        $data['courses'] = CourseModel::active()->paginate(10);
        return view('frontend-1.pages.course.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['courseCategories'] = CourseCategoryModel::get();
        $data['courseLevels'] = CourseLevelModel::get();
        return view('frontend-1.pages.course.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
        $course = $this->courseService->storeOrUpdate($request, null);
        $curriculums = $this->courseService->storeOrUpdateCurriculum($request, $course->id);
        $topics = $this->courseService->storeOrUpdateTopic($request, $curriculums);
    });

        return redirect()->route('course.index');
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['courseCategories'] = CourseCategoryModel::get();
        $data['courseLevels'] = CourseLevelModel::get();
        $data['course'] = CourseModel::where('id', $id)
            ->with([
                'courseCurriculum' => function($query) {
                    $query->with([
                        'curriculumTopics',
                        'curriculumScormPackage',
                        'curriculumFolder' => function($folderQuery) {
                            $folderQuery->with('innerFolderRecursive');
                        }
                    ]);
                }
            ])
            ->first();
        return view('frontend-1.pages.course.show', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['courseCategories'] = CourseCategoryModel::get();
        $data['courseLevels'] = CourseLevelModel::get();
        $data['course'] = CourseModel::where('id', $id)
            ->with([
                'courseCurriculum' => function($query) {
                    $query->with([
                        'curriculumTopics',
                        'curriculumScormPackage',
                        'curriculumFolder' => function($folderQuery) {
                            $folderQuery->with('innerFolderRecursive');
                        }
                    ]);
                }
            ])
            ->first();
        return view('frontend-1.pages.course.edit', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        DB::transaction(function () use ($request, $id) {
            $course = $this->courseService->storeOrUpdate($request, $id);
            $curriculums = $this->courseService->storeOrUpdateCurriculum($request, $course->id);
            $topics = $this->courseService->storeOrUpdateTopic2($request, $curriculums);
        });

        return redirect()->back();
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $course = CourseModel::find($id);
        $curriculums = CourseCurriculumModel::where('course_id', $id)->pluck('id');
        if ($curriculums){
            foreach ($curriculums as $curriculum){
                $topics = CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->pluck('id');
                if ($topics){
                    foreach ($topics as $topic) {
                        $learningResources = LearningResourceModel::where('course_curriculum_topic_id', $topic)->pluck('id');
                        if ($learningResources){
                            foreach ($learningResources as $learningResource) {
                                LearningResourceModel::find($learningResource)->delete();
                            }
                        }
                        if ($topic){
                            CourseCurriculumTopicModel::find($topic)->delete();
                        }
                    }
                }
                CourseCurriculumModel::find($curriculum)->delete();
            }
        }
//        $scormPackages = ScormPackageModel::where('course_id', $course->id)->get();
//        if ($scormPackages){
//            foreach ($scormPackages as $scormPackage){
//                ScormPackageModel::find($scormPackage->id)->delete();
//                $file_path = public_path('scorm_packages/'.$scormPackage->link);
//                if(File::exists($file_path)) {
//                    File::deleteDirectory($file_path);
//                }
//            }
//        }

        $course->delete();
        return redirect()->back();
    }

    public function insertCurriculum(Request $request){
        $curriculum = CourseCurriculumModel::updateOrCreate(
            [
                'id' => null
            ],
            [
                'course_id' => $request->course_id,
                'name' => $request->curriculum_name,
            ]
        );;
        return redirect()->back();
    }

    public function frontendCourseIndex()
    {
        $data['courses'] = CourseModel::active()->paginate(12);
        return view('frontend-1.pages.course.index-frontend', $data);
    }

    public function scormResource($link)
    {
        return view('frontend-1.pages.course.scorm-player', compact('link'));
    }


    public function curriculumCompletionMark(Request $request){
        $curriculum = CourseCurriculumModel::find($request->input('CurriculumId'));
        if ($curriculum->is_completion == 0){
            CourseCurriculumModel::updateOrCreate(
                [
                    'id' => $curriculum->id,
                ],
                [
                    'is_completion' => 1
                ]
            );
        }
        return 1;
    }

    public function deleteScormPackage(Request $request)
    {
        $scormPackage = ScormPackageModel::find($request->input('ScormPackageId'));
        $file_path = public_path('scorm_packages/'.$scormPackage->link);
        if(File::exists($file_path)) {
            File::deleteDirectory($file_path);
        }
        $deleteStatus = $scormPackage->delete();
        return $deleteStatus;
    }

    public function deleteTopic(Request $request)
    {
        $topic = CourseCurriculumTopicModel::find($request->input('TopicId'));
        $learningResources = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->pluck('id');
        foreach ($learningResources as $index => $value) {
            LearningResourceModel::find($value)->delete();
        }
        $deleteStatus = $topic->delete();
        return $deleteStatus;
    }

    public function deleteCurriculum(Request $request)
    {
        $curriculum = CourseCurriculumModel::find($request->input('CurriculumId'));
        $topics = CourseCurriculumTopicModel::where('curriculum_id', $curriculum->id)->pluck('id');
        if ($topics){
            foreach ($topics as $topic) {
                $learningResources = LearningResourceModel::where('course_curriculum_topic_id', $topic)->pluck('id');
                if ($learningResources){
                    foreach ($learningResources as $learningResource) {
                        LearningResourceModel::find($learningResource)->delete();
                    }
                }
                if ($topic){
                    CourseCurriculumTopicModel::find($topic)->delete();
                }
            }
        }
        $deleteStatus = $curriculum->delete();
        return $deleteStatus;
    }


}
