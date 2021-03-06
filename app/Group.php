<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = ['id','name','TA'];
    public $timestamps = false;

    public function quiz()
    {
        return $this->hasMany('App\quizTitle' , 'group_id');
    }

    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser');
    }
}