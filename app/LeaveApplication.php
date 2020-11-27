<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    protected $guarded = [];

    public function leave_category() {
        return $this->belongsTo(LeaveCategory::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
