<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quizTitle extends Model
{
    
    protected $table = 'quiz_titles';
    protected $fillable = ['name', 'user_id','group_id'];
    public $timestamps = false;

     public function admin()
    {
        return $this->belongsTo('App\AdminUser');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function questions()
    {
        return $this->hasMany('App\Question' , 'quiz_titles_id');
    }

    public function results()
    {
        return $this->hasMany('App\Result' , 'quiz_id');
    }
}