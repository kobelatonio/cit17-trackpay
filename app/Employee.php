<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    // I made the Employee model authenticatable as well, instead of having
    // a user_type column in the User model because Employee is different from 
    // the User in a way that it requires specific columns which the User 
    // does not such as the position_id. This is only used in the time in/out
    // of the employees (with email and password) and updating their passwords.

    protected $guarded = [];

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function daily_time_records() {
        return $this->hasMany(DailyTimeRecord::class);
    }

    public function leave_applications() {
        return $this->hasMany(LeaveApplication::class);
    }

    public function annual_leaves() {
        return $this->hasMany(AnnualLeave::class);
    }

    public function deductible_records() {
        return $this->hasMany(DeductibleRecord::class);
    }

    public function monthly_salaries() {
        return $this->hasMany(MonthlySalary::class);
    }

    public function getFullNameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }

    public function getFormattedContactNumberAttribute() {
        return substr($this->contact_number, 0, 4).'-'.substr($this->contact_number, 5, 3).'-'.substr($this->contact_number, 8, 4);
    }

    public function getNthBirthdayAttribute() {
        $number = date_diff(date_create($this->birthdate), date_create(date('Y-m-d', strtotime('12/31'))))->y;
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number.'th';
        else
            return $number.$ends[$number % 10];
    }

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
