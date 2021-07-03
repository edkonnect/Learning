<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessagesReason extends Model {

    protected $table = 'message_reason';
    protected $fillable = [
        'id',
        'reason',
        'status',
        'created_at',
        'updated_at',
    ];

}
