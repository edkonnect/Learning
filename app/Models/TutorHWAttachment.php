<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorHWAttachment extends Model {

    protected $table = 'tutor_hw_attachment';
    protected $fillable = [
        'id',
        'attachment_id',
        'session_id',
        'sl_no',
        'attachment_link',
        'attachment_link_old',
        'created_at',
        'updated_at',
    ];

//    public function getStudentDetail() {
//        return $this->hasMany('App\Models\User', 'student_id', 'id');
//    }
    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }

}
