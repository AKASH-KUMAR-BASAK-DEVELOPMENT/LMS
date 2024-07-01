<?php

namespace Module\LMS\Services;

use App\Traits\FileSaver;
use Module\LMS\Models\QuestionModel;

class QuestionService
{
    use FileSaver;

    public function storeOrUpdate($request, $id, $exam)
    {
        //questions
        $singleElementArrays = array_map(function ($item){
            return $item[0];
        }, $request->question);
        $questions = array_reverse($singleElementArrays);
        $arrayKeys = array_keys($request->question);

        //marks
        $marks = [];
        foreach ($arrayKeys as $index => $value){
            $marks[] = $request->mark.$value;
        }

        //types
        $types = [];
        foreach ($arrayKeys as $index => $value){
            $types[] = $request->{'type' . $value};
        }
        $reverseTypes = array_reverse($types);

        //images
        $images = [];
        foreach ($arrayKeys as $index => $value){
            $images[] = $request->{'image' . $value};
        }
        $reverseImages= array_reverse($images);

        //fillInTheBlanks
        $fillInTheBlanks = [];
        foreach ($arrayKeys as $index => $value){
            $fillInTheBlanks[] = $request->{'fillInTheBlanks' . $value};
        }
        $reverseFillInTheBlanks = array_reverse($fillInTheBlanks);

        //option1
        $option1 = [];
        $option2 = [];
        $option3 = [];
        $option4 = [];
        $option5 = [];
        $option7 = [];
        $option8 = [];
        $option9 = [];
        $option10 = [];
        $option11 = [];
        $option12 = [];
        $option13 = [];
        $option14 = [];
        $option15 = [];
        $option16 = [];
        $option17 = [];
        $option18 = [];
        $option19 = [];
        $option20 = [];

        foreach ($arrayKeys as $index => $value){
//            $option1[] = $request->{'option1' . $value};
            for ($i = 1; $i <= 20; $i++) {
                ${"option$i"}[] = $request->{"option$i" . $value};
            }
        }
        for ($i = 1; $i <= 20; $i++) {
            ${"reverseOption$i"} = array_reverse(${"option$i"});
        }

        // combine
        $combined = [];
        foreach ($questions as $key => $question) {
            $optionArray = [];
            for ($i = 1; $i <= 20; $i++) {
                $reverseOption = ${"reverseOption$i"};
                if ($reverseOption !== null) {
                    $index = array_search($key, array_keys($questions));
                    if ($index !== false && isset($reverseOption[$index])) {
                        $optionArray[] = $reverseOption[$index];
                    }
                }
            }
            $combinedEntry = [
                'Question' => $question != null ? $question : '',
                'Mark' => $marks != null ? $marks[array_search($key, array_keys($questions))] : '',
                'Type' => $reverseTypes != null ? $reverseTypes[array_search($key, array_keys($questions))] : '',
                'Image' => $reverseImages != null ? $reverseImages[array_search($key, array_keys($questions))] : '',
                'FillInTheBlanks' => $reverseFillInTheBlanks != null ? $reverseFillInTheBlanks[array_search($key, array_keys($questions))] : '',
                'Options' => $optionArray,

            ];

            $combined[] = $combinedEntry;
        }

        // save to database
        foreach ($combined as $index => $value){
            $option = json_encode($value['Options']);
            $question = QuestionModel::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'exam_id' => $exam->id,
                    'title' => $value['Question'],
                    'option' => $value['Type'] == 'Fill in the blanks' ? $value['FillInTheBlanks'] : $option,
                    'type' => str_replace(' ', '-', strtolower($value['Type'])),
                    'mark' => $value['Mark'],
                ]
            );
            if (isset($value['Image'])) {
                $this->upload_file($value['Image'], $question, 'image', 'exam_question_image/'.uniqid());
            }
        }
        return $question;
    }

}
