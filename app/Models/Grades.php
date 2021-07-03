<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model {

    protected $table = 'grade';
    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at',
    ];

}
