<?php

namespace App;

use Illuminate\Foundation\Auth\user as Authenticatable;

class Employee extends Authenticatable
{
    // I made the Employee model authenticatable as well, instead of having
    // a user_type column in the User model because Employee is different from 
    // the User in a way that it requires specific columns which the User 
    // does not such as the position_id. This is only used in the time in/out
    // of the employees (with email and password) and updating their passwords.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'contact_number', 'birthdate', 'gender', 'position_id', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
