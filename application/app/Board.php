<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $timestamps = false;
    protected $table = 'board';
    protected $fillable = [
        'table_name',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
