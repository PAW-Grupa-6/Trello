<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBoard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('board', function (Blueprint $boards) {
         $boards->increments('id');
         $boards->string('table_name');
         $boards->unsignedInteger('user_id');
     });
     Schema::table('board', function (Blueprint $boards) {
       $boards->foreign('user_id')->references('id')->on('users');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
