<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model {

    protected $table = 'tutors';
    protected $fillable = [
        'tutor_id',
        'username',
        'password',
        'Name',
        'active',
        'created_at',
    ];

    public function getParentDetail() {
        return $this->belongsTo('App\Models\User', 'parent_id', 'id');
    }

}
