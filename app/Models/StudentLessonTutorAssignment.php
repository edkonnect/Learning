<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLessonTutorAssignment extends Model {

    protected $table = 'student_lesson_tutor_assignment';
    protected $fillable = [
        'id',
        'student_id',
        'tutor_id',
        'lesson_id',
        'course_id',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'updated_at',
    ];
    
    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function getLessonPlan() {
        return $this->belongsTo('App\Models\LessonPlan', 'lesson_id', 'id');
    }
    public function getTutorDetails() {
        return $this->belongsTo('App\Models\User', 'tutor_id', 'id');
    }
    public function getStudentDetails() {
        return $this->belongsTo('App\Models\User', 'student_id', 'id');
    }
    public function getSubTopics() {
        return $this->belongsTo('App\Models\LessonPlanDetails', 'lesson_id');
    }
    

}
