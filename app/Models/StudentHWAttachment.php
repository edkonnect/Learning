<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHWAttachment extends Model {

    protected $table = 'student_hw_attachment';
    protected $fillable = [
        'id',
        'attachment_id',
        'session_id',
        'sl_no',
        'attachment_link',
        'created_at',
        'updated_at',
    ];

//    public function getStudentDetail() {
//        return $this->hasMany('App\Models\User', 'student_id', 'id');
//    }
    public function getSessionDetail() {
        return $this->belongsTo('App\Models\StudentSession', 'session_id','id');
    }
    public function getStudentDetail($id) {
        return Student::find($id);
    }
    public function getParentDetail($id) {
        $getStud=Student::find($id);
        return User::find($getStud->parent_id);
    }

}
