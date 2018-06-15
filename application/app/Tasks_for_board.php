<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks_for_board extends Model
{
  public $timestamps = false;
  protected $table = 'tasks_for_boards';
  protected $fillable = [
      'board_id',
      'task_id'
  ];
}
