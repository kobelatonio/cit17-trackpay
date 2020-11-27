<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DailyTimeRecord extends Model
{
    protected $guarded = [];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function getFormattedTimeInAttribute() {
        return date('h:i A', strtotime($this->time_in));
    }

    public function getFormattedTimeOutAttribute() {
        return date('h:i A', strtotime($this->time_out));
    }
}

