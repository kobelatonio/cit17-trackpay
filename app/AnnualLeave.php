<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AnnualLeave extends Model
{
    protected $guarded = [];
    protected $primaryKey = ['leave_category_id', 'employee_id'];
    public $incrementing = false;

    protected function setKeysForSaveQuery(Builder $query)
	{
    	return $query->where('leave_category_id', $this->getAttribute('leave_category_id'))
    	->where('employee_id', $this->getAttribute('employee_id'));
	}
}
