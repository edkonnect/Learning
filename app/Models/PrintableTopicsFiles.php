<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintableTopicsFiles extends Model {

    protected $table = 'printable_topics_filelist';
    protected $fillable = [
        'id',
        'topic_id',
        'description',
        'location',
        'filename',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getTopicDetail() {
        return $this->belongsTo('App\Models\PrintableTopics', 'topic_id', 'id');
    }

}
