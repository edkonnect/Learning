<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomDashboardData extends Model {

    protected $table = 'custom_dashboard_data';
    protected $fillable = [
        'id',
        'title',
        'description',
        'link',
        'status',
        'type',
        'created_at',
        'updated_at',
    ];

}
