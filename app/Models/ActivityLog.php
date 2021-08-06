<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
  protected $table = 'activity_logs';
  protected $fillable = [
      'id',
    'user_name',
    'login_time',
    'logout_time',

  ];
}
