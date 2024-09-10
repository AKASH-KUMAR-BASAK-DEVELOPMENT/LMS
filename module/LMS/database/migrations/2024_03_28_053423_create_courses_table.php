<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_category_id')->constrained('course_categories', 'id');
            $table->foreignId('course_level_id')->constrained('course_levels', 'id');
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('short_description')->nullable();
            $table->string('language')->nullable();
            $table->string('duration')->nullable();
            $table->string('total_lessons')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('video_url')->nullable();
            $table->string('tags')->nullable();
            $table->text('prerequisites')->nullable();
            $table->tinyInteger('is_featured')->default('0');
            $table->tinyInteger('status')->default('1');
            $table->foreignId('created_by')->nullable()->constrained('users', 'id');
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id');
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
        Schema::dropIfExists('courses');
    }
}
