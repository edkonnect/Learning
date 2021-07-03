<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $table = 'course';
    protected $fillable = [
        'id',
        'course_name',
        'status',
        'created_at',
        'updated_at',
    ];

}
