<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAnalytics extends Model {

  protected $table = 'student_analytics';
    protected $fillable = [
        'id',
        'course_id',
        'session_id',
        'student_id',
        'proficiency_level',
        'no_of_hours_remaining',
        'no_of_days_used',
        'participation_rate',
        'newSkills',
        'assessmentTaken',
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
