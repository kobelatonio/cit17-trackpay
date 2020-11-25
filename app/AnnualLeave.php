<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AnnualLeave extends Model
{
    protected $guarded = [];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
