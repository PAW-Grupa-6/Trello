<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public $timestamps = false;
  protected $table = 'tasks';
  protected $fillable = [
      'task_name',
      'tast_description'
  ];
}
