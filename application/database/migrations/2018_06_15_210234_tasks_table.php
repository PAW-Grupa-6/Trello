<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tasks', function (Blueprint $tasks) {
         $tasks->increments('id');
         $tasks->string('name');
         $tasks->string('description');
         $tasks->unsignedInteger('board_id');
     });

        Schema::table('tasks', function (Blueprint $tasks) {
            $tasks->foreign('board_id')->references('id')->on('board');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
