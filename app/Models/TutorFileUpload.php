<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorFileUpload extends Model
{
  protected $table = 'tutor_file_upload';
  protected $fillable = [
      'id',
      'tutor_id',
      'location',
      'filename',
      'created_at',
      'updated_at',
  ];
}
