<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelmsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_settings', function (Blueprint $table) {
            $table->id();
            $table->string('course_curriculum_assignment_percentage')->nullable();
            $table->string('course_curriculum_exam_percentage')->nullable();
            $table->string('course_curriculum_quiz_percentage')->nullable();
            $table->string('course_competency_full_mark')->nullable();
            $table->string('course_credit_transfer_mark')->nullable();
            $table->string('course_not_yet_started_mark')->nullable();
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
        Schema::dropIfExists('lms_settings');
    }
}
