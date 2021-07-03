<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model {

    protected $table = 'message';
    protected $fillable = [
        'id',
        'date',
        'time',
        'reason_id',
        'message_text',
        'view_status',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getUserDetail() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function getReason() {
        return $this->belongsTo('App\Models\MessagesReason', 'reason_id','id');
    }
    public function getReply() {
        return $this->hasOne('App\Models\MessagesReply', 'message_id','id');
    }

}
