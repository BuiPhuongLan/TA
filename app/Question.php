<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['id','type_quiz','question','quiz_titles_id'];
    public $timestamps = false;

    public function quiz()
    {
        return $this->belongsTo('App\quizTitle');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer' , 'question_id');
    }
}