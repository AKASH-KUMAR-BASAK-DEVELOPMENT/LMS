<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseResultModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users', 'id');
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->string('total_mark')->nullable();
            $table->string('grade')->nullable();
            $table->string('total_assignment_mark')->nullable();
            $table->string('total_manual_exam_mark')->nullable();
            $table->string('total_ai_quiz_mark')->nullable();
            $table->string('average_attendance')->nullable();
            $table->text('advice')->nullable();
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
        Schema::dropIfExists('student_course_results');
    }
}
