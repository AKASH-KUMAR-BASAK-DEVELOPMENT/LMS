<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->comment('Universal Roles: 1=admin, 2=manager, 3=teacher, 4=student, 5=parent, 6=course creator');
            $table->string('name')->comment('Universal Roles: 1=admin, 2=manager, 3=teacher, 4=student, 5=parent, 6=course creator');
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
        Schema::dropIfExists('roles');
    }
}
