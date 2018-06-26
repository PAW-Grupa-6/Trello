<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public $timestamps = false;
  protected $table = 'tasks';
  protected $fillable = [
      'name',
      'description'
  ];


    public function board(){
        return $this->belongsTo('App\Board');
    }
}
