<?php

namespace Module\LMS\Services;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Module\LMS\Models\CourseCurriculumModel;
use Module\LMS\Models\CourseCurriculumTopicModel;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\LearningResourceModel;
use Module\LMS\Models\ScormPackageModel;
use ZipArchive;

class CourseService
{
    use FileSaver;

    public function storeOrUpdate(Request $request, $id){
        $course = CourseModel::updateOrCreate(
            [
                'id'                 => $id
            ],
            [
                'course_category_id' => $request->course_category,
                'course_level_id'    => $request->course_level,
                'title'              => $request->title,
                'start_date'         => $request->start_date,
                'end_date'           => $request->end_date,
                'language'           => $request->language,
                'is_featured'        => $request->is_featured ?? 0,
                'price'              => $request->price,
                'discount'           => $request->discount,
                'duration'           => $request->duration,
                'total_lessons'      => $request->total_lessons,
                'short_description'  => $request->short_description,
                'description'        => $request->description,
                'video_url'          => $request->video_url,
                'tags'               => json_encode(explode(',', $request->tags)),
                'prerequisites'      => $request->prerequisites,
            ]
        );
        $this->upload_file($request->image, $course, 'image', 'upload/course_image');
        $this->upload_file($request->video, $course, 'video', 'upload/course_video');
        if ($request->file('scorm_package')){
            $this->scormUpload($request, $course);
        }
        return $course;
    }

    public function storeOrUpdateCurriculum($request, $course_id)
    {
        if ($request->curriculum_names) {
            $curriculums = [];
            foreach ($request->curriculum_names as $key => $value) {
                $id = $request->curriculum_ids[$key] ?? null;
                $curriculum = CourseCurriculumModel::updateOrCreate(
                    [
                        'id' => $id
                    ],
                    [
                        'course_id' => $course_id,
                        'name' => $value,
                    ]
                );
                $curriculums[] = $curriculum;
            }
            return $curriculums;
        }
    }

    public function storeOrUpdateTopic($request, $curriculums)
    {
        if ($request->topic_names){
        $topics = [];
        foreach ($request->topic_names as $key => $values){
            foreach ($curriculums as $curriculum){
                if ($key == $curriculum->name){
                    foreach ($values as $index => $value){
                        $topic = CourseCurriculumTopicModel::updateOrCreate(
                            [
                                'id' => null,
                            ],
                            [
                                'curriculum_id' => $curriculum->id,
                                'name' => $value,
                                'description' => $request->topic_descriptions[$key][$index] ?? '',
                            ]
                        );
                        $topics[] = $topic;
                        $this->storeOrUpdateLearningResource($request->topic_video_links, null, $topic, $key, $index, 'url');
                        $this->storeOrUpdateLearningResource($request->topic_images, null, $topic, $key, $index, 'image');
                        $this->storeOrUpdateLearningResource($request->topic_videos, null, $topic, $key, $index, 'video');
                        $this->storeOrUpdateLearningResource($request->topic_documents, null, $topic, $key, $index, 'document');
                    }
                }
            }
        }
        return $topics;
        }
    }

    public function storeOrUpdateLearningResource($request, $id, $topic, $key, $index, $type)
    {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'course_curriculum_topic_id' => $topic->id,
                    'type' => $type,
                    'link' => ($type=='url'? $request[$key][$index] : '//') ?? '//',
                ]
            );
        if ($type != 'url') {
            if(isset($request[$key][$index])){
                $this->upload_file($request[$key][$index], $learningResource, 'link', 'upload/topic_'.$type.'_'.$learningResource->id);
            }
        }
        return $learningResource;
    }

    public function scormUpload(Request $request, $course)
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
                    'course_id' => $course->id,
                    'link' => $filename,
                ]
            );
        }

        return back()->with('success', 'SCORM package uploaded successfully.');
    }


    public function storeOrUpdateTopic2($request, $curriculums)
    {
        if ($request->topic_names) {
            $topics = [];
            foreach ($request->topic_names as $key => $values) {
                foreach ($curriculums as $curriculum) {
                    if ($key == $curriculum->name) {
                        foreach ($values as $index => $value) {
                            $topicId = $request->topic_id[$key][$index] ?? null;
                            $topic = CourseCurriculumTopicModel::updateOrCreate(
                                [
                                    'id' => $topicId,
                                ],
                                [
                                    'curriculum_id' => $curriculum->id,
                                    'name' => $value,
                                    'description' => $request->topic_descriptions[$key][$index] ?? '',
                                ]
                            );
                            $topics[] = $topic;
                            $this->storeOrUpdateLearningResource2($request->topic_video_links, $topicId, $topic, $key, $index, 'url');
                            $this->storeOrUpdateLearningResource2($request->topic_images, $topicId, $topic, $key, $index, 'image');
                            $this->storeOrUpdateLearningResource2($request->topic_videos, $topicId, $topic, $key, $index, 'video');
                            $this->storeOrUpdateLearningResource2($request->topic_documents, $topicId, $topic, $key, $index, 'document');
                        }
                    }
                }
            }
            return $topics;
        }
    }

    public function storeOrUpdateLearningResource2($request, $id, $topic, $key, $index, $type)
    {
        $id = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', $type)->value('id');
        if ($type == 'url') {
            $learningResource = LearningResourceModel::updateOrCreate(
                [
                    'id' => $id,
                    'course_curriculum_topic_id' => $topic->id,
                ],
                [
                    'type' => $type,
                    'link' => ($type == 'url' ? $request[$key][$index] : '//') ?? '//',
                ]
            );
            return $learningResource;
        }
            if ($type != 'url') {
                if(isset($request[$key][$index])){
                    $learningResource = LearningResourceModel::updateOrCreate(
                        [
                            'id' => $id,
                            'course_curriculum_topic_id' => $topic->id,
                        ],
                        [
                            'type' => $type,
                            'link' => ($type=='url'? $request[$key][$index] : '//') ?? '//',
                        ]
                    );
                    $this->upload_file($request[$key][$index], $learningResource, 'link', 'upload/topic_'.$type.'_'.$learningResource->id);
                    return $learningResource;
                }
            }
    }


}
