<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintableTopics extends Model {

    protected $table = 'printable_topics';
    protected $fillable = [
        'id',
        'topic',
        'course_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getCourseDetail() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function getTopicFiles() {
        return $this->hasMany('App\Models\PrintableTopicsFiles', 'topic_id');
    }

}
