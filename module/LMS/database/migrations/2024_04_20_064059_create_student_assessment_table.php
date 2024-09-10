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
            $table->foreignId('assessment_id')->constrained('course_assessments', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('link')->nullable();
            $table->string('evaluation_type')->nullable();
            $table->string('grade')->nullable();
            $table->string('mark')->nullable();
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
        Schema::dropIfExists('student_assessments');
    }
}
