<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatequestionsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams', 'id');
            $table->string('title');
            $table->text('option')->nullable();
            $table->enum('type', ['true/false', 'selection', 'essay', 'fill-in-the-blanks', 'short-answer', 'multiple-choice', 'puzzle'])->nullable();
            $table->string('mark')->nullable();
            $table->string('answer')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
