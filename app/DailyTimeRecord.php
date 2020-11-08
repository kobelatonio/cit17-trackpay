<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DailyTimeRecord extends Model
{
    protected $guarded = [];
    protected $primaryKey = ['date', 'employee_id'];
    public $incrementing = false;

    protected function setKeysForSaveQuery(Builder $query)
	{
    	return $query->where('date', $this->getAttribute('date'))
    	->where('employee_id', $this->getAttribute('employee_id'));
	}
}

