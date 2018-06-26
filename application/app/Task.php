<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $table = 'tasks';
    protected $fillable = [
        'name',
        'description'
    ];
    protected $dates = ['deleted_at'];



    public function board(){
        return $this->belongsTo('App\Board');
    }
}
