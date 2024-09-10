<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentExamEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exam_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->tinyInteger('retake_request')->default(0)->nullable();
            $table->tinyInteger('is_retake')->nullable();
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
        Schema::dropIfExists('student_exam_enrollments');
    }
}
