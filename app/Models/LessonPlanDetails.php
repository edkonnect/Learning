<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlanDetails extends Model {

    protected $table = 'lesson_plan_details';
    protected $fillable = [
        'id',
        'lesson_id',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

}
