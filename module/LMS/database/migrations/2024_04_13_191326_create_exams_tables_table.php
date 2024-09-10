<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateexamsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('course_curriculum_id')->constrained('course_curriculums', 'id');
            $table->date('date')->nullable();
            $table->string('duration')->nullable()->comment('unite => minute');
            $table->string('pass_mark')->nullable();
            $table->enum('type', ['exam', 'quiz'])->nullable();
            $table->foreignId('folder_id')->nullable()->constrained('folders', 'id');
            $table->tinyInteger('status')->default(1);
            $table->foreignId('created_by')->constrained('users', 'id');
            $table->foreignId('updated_by')->constrained('users', 'id');
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
        Schema::dropIfExists('exams');
    }
}
