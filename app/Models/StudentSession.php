<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSession extends Model {
public $timestamps = false;
    protected $table = 'student_session';
    protected $fillable = [
        'id',
        'lesson_id',
        'course_id',
        'tutor_id',
        'lesson_detail_id',
        'isDelay',
        'student_id',
        'topic_name',
        'status',
        'session_date',
        'session_notes',
        'homework',
        'assessment_test',
        'homework_link',
        'attachment_id',
        'demo',
        'created_at',

    ];

    public function getStudentDetail() {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
    public function getTutorDetail() {
        return $this->belongsTo('App\Models\User', 'tutor_id', 'id');
    }
    public function getLessonDetail() {
        return $this->belongsTo('App\Models\LessonPlan', 'lesson_id', 'id');
    }
    public function getLessonPlanDetail() {
        return $this->belongsTo('App\Models\LessonPlanDetails', 'lesson_detail_id', 'id');
    }
    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }
    public function getHWAttachmentDetail() {
        return $this->hasMany('App\Models\TutorHWAttachment', 'attachment_id','id');
    }
    public function getStudHWAttachmentDetail() {
        return $this->hasMany('App\Models\StudentHWAttachment', 'attachment_id','id');
    }

}
