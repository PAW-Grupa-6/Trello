<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TasksTableToBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tasks_for_boards', function (Blueprint $tasks_for_boards) {
         $tasks_for_boards->increments('id');
         $tasks_for_boards->unsignedInteger('board_id');
         $tasks_for_boards->unsignedInteger('task_id');
     });
     Schema::table('tasks_for_boards', function (Blueprint $tasks_for_boards) {
       $tasks_for_boards->foreign('board_id')->references('id')->on('board');
     });
     Schema::table('tasks_for_boards', function (Blueprint $tasks_for_boards) {
       $tasks_for_boards->foreign('task_id')->references('id')->on('tasks');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_for_boards');
    }
}
