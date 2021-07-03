<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
  protected $table = 'assessments';
  protected $fillable = [
      'id',
      'student_id',
      'course_id',
      'lesson_id',
      'start_date',
      'end_date',
      'description',
      'assmt_url',
      'status',
      'result_pdf',

  ];
  public function student(){
    return $this->belongsTo('App\Models\Student', 'student_id', 'id');

  }
  public function getCourseDetail() {
      return $this->belongsTo('App\Models\Course', 'course_id','id');
  }
  public function getTutorDetail() {
      return $this->belongsTo('App\Models\User', 'tutor_id', 'id');
  }
}
