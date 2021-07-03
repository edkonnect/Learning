<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'username',
        'no_of_years_taught',
        'education_qualification',
        'experience_summary',
        'resume',
        'calender_id',
        'roles',
        'phone',
        'profile_image',
        'parent_id',
        'email',
        'email_verified_at',
        'password',
        'password_old',
        'remember_token',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getStudents() {
        return $this->hasOne('App\Models\Student', 'parent_id','id');
    }
    public function getRoles() {
        return $this->belongsTo('App\Models\Roles', 'roles','id');
    }
}
