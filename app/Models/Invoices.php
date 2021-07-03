<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model {

    protected $table = 'invoices';
    protected $fillable = [
        'id',
        'student_id',
        'date',
        'invoice_link',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getStudentDetail() {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

}
