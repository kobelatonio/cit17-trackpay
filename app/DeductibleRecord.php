<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DeductibleRecord extends Model
{
	protected $guarded = [];
    protected $primaryKey = ['date', 'employee_id', 'deductible_id'];
    public $incrementing = false;

    protected function setKeysForSaveQuery(Builder $query)
	{
    	return $query->where('date', $this->getAttribute('date'))
    	->where('employee_id', $this->getAttribute('employee_id'))
    	->where('deductible_id', $this->getAttribute('deductible_id'));
	}
}
