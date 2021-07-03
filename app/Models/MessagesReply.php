<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessagesReply extends Model {

    protected $table = 'message_reply';
    protected $fillable = [
        'id',
        'date_time',
        'message_id',
        'message_text',
        'admin_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getUserDetail() {
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }

}
