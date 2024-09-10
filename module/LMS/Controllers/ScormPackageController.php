<?php

namespace Module\LMS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicFolderModel;
use Module\LMS\Models\ScormPackageModel;
use Module\LMS\Services\CourseService;
use ZipArchive;

class ScormPackageController extends Controller
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
        return view('');
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create($id, $folder)
    {
        $curriculum = CourseCurriculumModel::find($id);
        $folder = CourseCurriculumTopicFolderModel::find($folder);
        return view('frontend-1.pages.course.scorm-package.create', compact('curriculum', 'folder'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'scorm_package.*' => 'required|file|mimes:zip|max:512000',
        ]);

        foreach ($request->file('scorm_package') as $index => $value) {
            $file = $value;
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) .'-'. $index .'-' . time();
            $destinationPath = public_path('scorm_packages/' . $filename);

            $zip = new ZipArchive;
            if ($zip->open($file->path()) === TRUE) {
                $zip->extractTo($destinationPath);
                $zip->close();
            } else {
                return back()->withErrors(['scorm_package' => 'Failed to extract the SCORM package.']);
            }

            $scormPackage = ScormPackageModel::updateOrCreate(
                [
                    'id' => null,
                ],
                [
                    'curriculum_id' => $request->curriculum_id,
                    'folder_id' => $request->folder_id ?? null,
                    'link' => $filename,
                ]
            );
        }

        return $request->course_id;
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
}
