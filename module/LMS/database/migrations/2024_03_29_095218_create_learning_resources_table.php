<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelearningResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_curriculum_topic_id')->constrained('course_curriculum_topics', 'id');
            $table->enum('type', ['image', 'video', 'text', 'pdf', 'word', 'excel', 'document', 'url'])->nullable();
            $table->string('link');
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
        Schema::dropIfExists('learning_resources');
    }
}
