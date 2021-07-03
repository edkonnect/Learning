<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorCourse extends Model {

    protected $table = 'tutor_course';
    protected $fillable = [
        'id',
        'course_id',
        'tutor_id',
        'status',
        'created_at',
        'updated_at',
    ];
    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }
    public function getTutorDetail() {
        return $this->belongsTo('App\Models\User', 'tutor_id', 'id')->orderBy('name','desc');
    }
    

}
