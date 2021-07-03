<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlan extends Model {

    protected $table = 'lesson_plan';
    protected $fillable = [
        'id',
        'topic_name',
        'descr',
        'grade',
        'course_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function getSubTopics() {
        return $this->hasMany('App\Models\LessonPlanDetails', 'lesson_id','id');
    }

}
