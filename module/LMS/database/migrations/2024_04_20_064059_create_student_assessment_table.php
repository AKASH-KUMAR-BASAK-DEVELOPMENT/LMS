<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('student_assessments');
    }
}
