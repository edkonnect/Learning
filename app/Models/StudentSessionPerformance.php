<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSessionPerformance extends Model {

    protected $table = 'student_session_performance';
    protected $fillable = [
        'id',
        'course_id',
        'session_id',
        'student_id',
        'session_attendance',
        'performance_level',
        'tutor_comments',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getStudentDetail() {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function getSessionDetail() {
        return $this->belongsTo('App\Models\StudentSession', 'session_id', 'id');
    }

    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

}
