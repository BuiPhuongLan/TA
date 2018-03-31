<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id','score','quiz_id',
    ];

    public function quiz()
    {
        return $this->belongsTo('App\quizTitle');
    }

    public function users()
    {
        return $this->belongsTo('App\AdminUser');
    }
}