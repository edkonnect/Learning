<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourseTutor extends Model {

    protected $table = 'student_course_tutor';
    protected $fillable = [
        'id',
        'student_id',
        'course_id',
        'tutor_id',
        'subscription',
        'eff_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

//    public function getStudentDetail() {
//        return $this->hasMany('App\Models\User', 'student_id', 'id');
//    }
    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }
    public function getStudentDetail() {
        return $this->belongsTo('App\Models\Student', 'student_id','id');
    }

}
