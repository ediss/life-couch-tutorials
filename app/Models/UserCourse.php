<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $table = 'user_course';
    public $timestamps = false;


    public function courses() {
        return $this->belongsTo('App\Models\Course','course_id', 'id');

    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


}
