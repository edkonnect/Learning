<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = 'student';
    protected $fillable = [
        'id',
        'name',
        'firstName',
        'lastName',
        'parent_id',
        'grade',
        'username',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getParentDetail() {
        return $this->belongsTo('App\Models\User', 'parent_id', 'id');
    }

}
