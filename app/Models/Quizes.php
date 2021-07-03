<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizes extends Model {

    protected $table = 'quizlet';
    protected $fillable = [
        'id',
        'sl_no',
        'grade',
        'course_id',
        'lesson_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function getLessonPlan() {
        return $this->belongsTo('App\Models\LessonPlan', 'lesson_id','id');
    }

}
