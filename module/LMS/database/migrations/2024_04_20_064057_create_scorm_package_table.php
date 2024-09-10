<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScormPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_scorm_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->constrained('course_curriculums', 'id');
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
        Schema::dropIfExists('course_scorm_packages');
    }
}
