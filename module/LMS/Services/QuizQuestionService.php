<?php

namespace Module\LMS\Services;

use App\Traits\FileSaver;
use Module\LMS\Models\QuestionModel;

class QuizQuestionService
{
    use FileSaver;

    public function storeOrUpdate($request, $id, $exam)
    {
        //question
        $singleElementArrays = array_map(function ($item) {
            return $item[0];
        }, $request['question']);
        $questions = array_reverse($singleElementArrays);
        $arrayKeys = array_keys($request['question']);

        //marks
        $marks = [];
        foreach ($arrayKeys as $index => $value) {
            $marks[] = $request['mark' . $value];
        }
        $reverseMarks = array_reverse($marks);

        //types
        $types = [];
        foreach ($arrayKeys as $index => $value) {
            $types[] = $request['type' . $value];
        }
        $reverseTypes = array_reverse($types);

        //images
        $images = [];
        foreach ($arrayKeys as $index => $value) {
            $images[] = $request['image' . $value] ?? null;
        }
        $reverseImages = array_reverse($images);

        //fillInTheBlanks
        $fillInTheBlanks = [];
        foreach ($arrayKeys as $index => $value) {
            $fillInTheBlanks[] = $request['fillInTheBlanks' . $value] ?? null;
        }
        $reverseFillInTheBlanks = array_reverse($fillInTheBlanks);

        //options
        $options = [];
        for ($i = 1; $i <= 20; $i++) {
            $options[$i] = [];
            foreach ($arrayKeys as $index => $value) {
                $options[$i][] = $request['option' . $i . $value] ?? null;
            }
            $options[$i] = array_reverse($options[$i]);
        }

        //selection answer
        $answer = [];
        foreach ($arrayKeys as $index => $value) {
            $answer[] = $request['answer' . $value];
        }
        $reverseAnswer = array_reverse($answer);

        // combine
        $combined = [];
        foreach ($questions as $index => $question) {
            $optionArray = [];
            for ($i = 1; $i <= 20; $i++) {
                if (isset($options[$i][$index])) {
                    $optionArray[] = $options[$i][$index];
                }
            }
            $combinedEntry = [
                'Question' => $question ?? '',
                'Mark' => $reverseMarks[$index] ?? '',
                'Type' => $reverseTypes[$index] ?? '',
                'Image' => $reverseImages[$index] ?? '',
                'FillInTheBlanks' => $reverseFillInTheBlanks[$index] ?? '',
                'Options' => array_filter($optionArray), // filter out null options
                'Answer' => $reverseAnswer[$index] ?? '',
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
                    'answer' => $value['Answer'],
                ]
            );
            if (isset($value['Image'])) {
                $this->upload_file($value['Image'], $question, 'image', 'exam_question_image/'.uniqid());
            }
        }
        return $question;
    }

}
