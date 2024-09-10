<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentExamAnswerSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exam_answer_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_exam_enrollment_id')->constrained('student_exam_enrollments', 'id');
            $table->foreignId('question_id')->constrained('questions', 'id');
            $table->text('answer');
            $table->text('mark')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_exam_answer_sheets');
    }
}
