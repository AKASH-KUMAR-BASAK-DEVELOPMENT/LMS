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
//                'price'              => $request->price,
//                'discount'           => $request->discount,
                'duration'           => $request->duration,
                'total_lessons'      => $request->total_lessons,
                'short_description'  => $request->short_description,
                'description'        => $request->description,
//                'video_url'          => $request->video_url,
                'tags'               => json_encode(explode(',', $request->tags)),
                'prerequisites'      => $request->prerequisites,
            ]
        );
        $this->upload_file($request->image, $course, 'image', 'upload/course_image');
//        $this->upload_file($request->video, $course, 'video', 'upload/course_video');
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

                        //url
                        if(isset($request->topic_video_links[$key][$index])){
                            $learningResource = LearningResourceModel::updateOrCreate(
                                [
                                    'id' => null,
                                ],
                                [
                                    'type' => 'url',
                                    'course_curriculum_topic_id' => $topic->id,
                                    'link' => $request->topic_video_links[$key][$index]
                                ]
                            );
                        }

                        //image
                        if(isset($request->topic_images[$key][$index])){
                            $learningResource = LearningResourceModel::updateOrCreate(
                                [
                                    'id' => null,
                                ],
                                [
                                    'course_curriculum_topic_id' => $topic->id,
                                    'type' => 'image',
                                ]
                            );
                            $this->upload_file($request->topic_images[$key][$index], $learningResource, 'link', 'upload/topic_'.'image'.'_'.$learningResource->id);
                        }

                        //video
                        if(isset($request->topic_videos[$key][$index])){
                            $learningResource = LearningResourceModel::updateOrCreate(
                                [
                                    'id' => null,
                                ],
                                [
                                    'course_curriculum_topic_id' => $topic->id,
                                    'type' => 'video',
                                ]
                            );
                            $this->upload_file($request->topic_videos[$key][$index], $learningResource, 'link', 'upload/topic_'.'video'.'_'.$learningResource->id);
                        }

                        //document
                        if(isset($request->topic_documents[$key][$index])){
                            $learningResource = LearningResourceModel::updateOrCreate(
                                [
                                    'id' => null,
                                ],
                                [
                                    'course_curriculum_topic_id' => $topic->id,
                                    'type' => 'document',
                                ]
                            );
                            $this->upload_file($request->topic_documents[$key][$index], $learningResource, 'link', 'upload/topic_'.'document'.'_'.$learningResource->id);
                        }
                    }
                }
            }
        }
        return $topics;
        }
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

                            //url
                            if(isset($request->topic_video_links[$key][$index])){
                                $id = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'url')->value('id');
                                $learningResource = LearningResourceModel::updateOrCreate(
                                    [
                                        'id' => $id,
                                        'course_curriculum_topic_id' => $topic->id,
                                    ],
                                    [
                                        'type' => 'url',
                                        'link' => $request->topic_video_links[$key][$index]
                                    ]
                                );
                            }

                            //image
                            if(isset($request->topic_images[$key][$index])){
                                $id = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'image')->value('id');
                                $learningResource = LearningResourceModel::updateOrCreate(
                                    [
                                        'id' => $id,
                                        'course_curriculum_topic_id' => $topic->id,
                                    ],
                                    [
                                        'type' => 'image',
                                    ]
                                );
                                $this->upload_file($request->topic_images[$key][$index], $learningResource, 'link', 'upload/topic_'.'image'.'_'.$learningResource->id);
                            }

                            //video
                            if(isset($request->topic_videos[$key][$index])){
                                $id = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'video')->value('id');
                                $learningResource = LearningResourceModel::updateOrCreate(
                                    [
                                        'id' => $id,
                                        'course_curriculum_topic_id' => $topic->id,
                                    ],
                                    [
                                        'type' => 'video',
                                    ]
                                );
                                $this->upload_file($request->topic_videos[$key][$index], $learningResource, 'link', 'upload/topic_'.'video'.'_'.$learningResource->id);
                            }

                            //document
                            if(isset($request->topic_documents[$key][$index])){
                                $id = LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'document')->value('id');
                                $learningResource = LearningResourceModel::updateOrCreate(
                                    [
                                        'id' => $id,
                                        'course_curriculum_topic_id' => $topic->id,
                                    ],
                                    [
                                        'type' => 'document',
                                    ]
                                );
                                $this->upload_file($request->topic_documents[$key][$index], $learningResource, 'link', 'upload/topic_'.'document'.'_'.$learningResource->id);
                            }
                        }
                    }
                }
            }
            return $topics;
        }
    }



}
