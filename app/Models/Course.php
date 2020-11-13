<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable = ['slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function saveCourse(array $course_data){
        
    }


}
