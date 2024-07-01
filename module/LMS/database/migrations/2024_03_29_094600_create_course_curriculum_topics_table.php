<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecourseCurriculumTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_curriculum_topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->constrained('course_curriculums', 'id');
            $table->string('name');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('course_curriculum_topics');
    }
}
