<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->constrained('course_curriculums', 'id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('allow_submission_form')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->dateTime('cut_off_date')->nullable();
            $table->dateTime('remind_grade_buy')->nullable();
            $table->tinyInteger('is_show_description')->nullable();
            $table->string('link')->nullable();
            $table->foreignId('folder_id')->nullable()->constrained('folders', 'id');
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
        Schema::dropIfExists('course_assessment');
    }
}
